<template>
  <div>
    <v-dialog width="fit-content" v-model="dialog">
      <v-card width="500"
        ><v-card-title>
          {{ $t("are you sure you want to delete") }} ?
        </v-card-title>
        <v-card-actions class="justify-center">
          <v-btn
            v-if="this.delete_item.length >= 1"
            @click="
              delete_all();
              dialog = false;
            "
            class="warning"
          >
            {{ $t("yes") }}
          </v-btn>
          <v-btn
            v-else
            @click="
              remove(module, globalItem);
              dialog = false;
            "
            class="warning"
          >
            {{ $t("yes") }}
          </v-btn>
          <v-btn @click="dialog = false" class="primary">
            {{ $t("no") }}
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-data-table
      :headers="
        translateHeaders(
          (headers || []).concat(
            $route.name == 'orders' ? 'update_status' : '',
            'actions'
          )
        )
      "
      :items="data || []"
      :options.sync="options"
      :page.sync="options.page"
      item-key="id"
      class="elevation-1"
      :sort-by.sync="options.sortBy"
      :sort-desc.sync="options.sortDesc"
      multi-sort
      v-bind="$attrs"
      v-on="$listeners"
    >
      <template v-slot:top>
        <!-- <v-row v-if="$route.name == 'categories' || $route.name == 'items'">
          <v-col cols="3">
            <v-text-field
              @keyup.enter="searching"
              outlined
              dense
              v-model="search"
              label="search..."
            >
              <template v-slot:prepend-inner
                ><v-btn @click="searching" icon>
                  <v-icon> fas fa-search </v-icon>
                </v-btn>
              </template>
            </v-text-field>
            <v-spacer></v-spacer> -->
      
        <v-text-field v-if="$route.name != 'order' || $route.name != 'payment'"
          @keyup.enter="searching"
           v-model="search"
           append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
        <v-btn class="ma-2" color="success" @click="exportxclx">
          {{ $t("export_excl") }}
        </v-btn>
        <v-btn class="ma-2" color="error" @click="dialog = true">
          {{ $t("multi delete") }}
        </v-btn>
        <template v-if="$route.name == 'orders'">
          {{$t('FILTER BY :')}}
          <v-btn
          
            style="margin-right: 3px"
            @click="filter_status(1)"
            small
            color="warning"
            dark
          >
            {{ $t("Delivery") }}
          </v-btn>
          <v-btn
            style="margin-right: 3px"
            @click="filter_status(0)"
            small
            color="secondary"
            dark
          >
            {{ $t("no payment") }}
          </v-btn>
          <v-btn
            style="margin-right: 3px"
            @click="filter_status(2)"
            small
            color="error"
            dark
          >
            {{ $t("canceled") }}
          </v-btn>
          <v-btn
            style="margin-right: 3px"
            @click="filter_status(3)"
            small
            color="success"
            dark
          >
            {{ $t("complete") }}
          </v-btn>
          </template>

        <!-- <v-btn icon @click="expordt(data)">few</v-btn> -->
      </template>
      <template v-for="(_, slot) of $scopedSlots" v-slot:[slot]="scope"
        ><slot :name="slot" v-bind="scope"
      /></template>

      <template v-if="$route.name == 'orders'" v-slot:item.status="{ item }">
        <tr>
          <td
            v-if="item.status == '1'"
            style="background-color: #98bb2f"
            
          >
            {{ $t("Delivery") }}
          </td>
          <td
            v-if="item.status == '2'"
            style="background-color: rgb(187 86 47)"
            class="custom-class"
          >
            {{  $t("canceled") }}
          </td>
          <td
            v-if="item.status == '3'"
            style="background-color: rgb(56 187 47)"
            class="custom-class"
          >
            {{ $t("complete") }}
          </td>
          <td
            v-if="item.status == '0'"
            style="background-color: rgb(116 139 141)"
            class="custom-class"
          >
            {{ $t("no payment") }}
          </td>
        </tr>
      </template>
      <template
        v-if="$route.name == 'orders'"
        v-slot:item.update_status="{ item }"
      >
        <v-col>
          <v-btn
            style="margin-bottom:3px"
            @click="update_status(item,1)"
            small
            color="warning"
            dark
          >
            {{ $t("Delivery") }}
          </v-btn>
          <v-btn
            style="margin-bottom:3px"
            @click="update_status(item,0)"
            small
            color="secondary"
            dark
          >
            {{ $t("no payment") }}
          </v-btn>
          <v-btn
            style="margin-bottom:3px"
            @click="update_status(item,2)"
            small
            color="error"
            dark
          >
            {{ $t("canceled") }}
          </v-btn>
          <v-btn
            style="margin-bottom:3px"
            @click="update_status(item,3)"
            small
            color="success"
            dark
          >
            {{ $t("complete") }}
          </v-btn>
        </v-col>
      </template>

      <template v-slot:item.actions="{ item }">
        <v-row>
          <v-btn
            icon
            @click="
              dialog = true;
              globalItem = item;
            "
          >
            <v-icon> fas fa-times</v-icon>
          </v-btn>

          <v-btn icon @click="navigate_to_form(item)">
            <v-icon> fas fa-edit</v-icon>
          </v-btn>
          <v-checkbox
            style="margin-top: 4px"
            color="red"
            hide-details
            @change="multi_delete(item.id)"
          ></v-checkbox>
        </v-row>
      </template>
    </v-data-table>
     <v-pagination
      v-model="options.page"
      :length="meta.last_page"
      circle
      color="primary"
    ></v-pagination>
  </div>
</template>
<script>
import { mapState } from "vuex";
import { json2excel, excel2json } from "js2excel";

export default {
  name: "data-table",
  props: {
    module: String,
    params: Object,
  },
  data() {
    return {
      globalItem: {},
      search: "",
      delete_item: [],
      dialog: false,
      options: {
        sortBy: [],
        sortDesc: [],
        itemKey: "item.",
      },
      sortingData: { sortBy: [], sortDesc: [] },
    };
  },
  mounted() {
    if (this.module) {
      this.$store.dispatch(`${this.module}/index`, this.params);
    }
  },
  computed: {
    ...mapState({
      data: function (state) {
        return state[this.module].all;
      },
      headers: function (state) {
        return state[this.module].headers;
      },
      meta: function (state) {
        return state[this.module].meta;
      },
      form_route: function (state) {
        return state[this.module].form_route;
      },
    }),
  },
  methods: {
    filter_status(status){
      this.$store.dispatch("order/index",{status_filter:status});

    },
    update_status(item,status){
      this.$store.dispatch("order/update",{id:item.id,status:status,update_status:1});
    
    },
    delete_all() {
      if (this.delete_item.length >= 1) {
        this.delete_item.forEach((element) => {
          this.$store.dispatch(`${this.module}/delete`, { id: element });
        });
        this.delete_item = [];
        // window.location.reload()
      }
    },
    exportxclx() {
      let data = this.data;
      // this will be export a excel and the file's name is user-info-data.xlsx
      // the default file's name is excel.xlsx
      try {
        json2excel({
          data,
          name: this.$route.name,
          formateDate: "yyyy/mm/dd",
        });
      } catch (e) {
        console.error("export error");
      }

      // for webpack 3: dynamic import
      // import(/* webpackChunkName: "js2excel" */ 'js2excel').then(({json2excel}) => {
      //     json2excel({
      //         data,
      //         name: 'test',
      //         formateDate: 'dd/mm/yyyy'
      //     });
      // }).catch((e) => {

      // });
    },
    searching() {
      this.$store.dispatch(`${this.module}/index`, { search: this.search });
    },
    translateHeaders(headers) {
      return headers.map((i) => {
        return {
          text: this.$t(i),
          value: i,
        };
      });
    },
    remove(module, item) {
      this.$store.dispatch(`${module}/delete`, item);
    },
    multi_delete(id) {
      if (!this.delete_item.includes(id)) {
        this.delete_item.push(id);
      } else {
        this.delete_item.splice(this.delete_item.indexOf(id), 1);
      }
      console.log(this.delete_item);
    },
    navigate_to_form(item) {
      if (this.module == "order") {
        this.$router.push(`/orders/show/${item.id}`);
      } else {
        if (this.module == "discount" || this.module == "coupon")
          this.$router.push(`${this.form_route}/${item.code}`);
        else this.$router.push(`${this.form_route}/${item.id}`);
      }
    },
  },
  watch: {
    options: {
      handler(val) {
        this.$store.dispatch(`${this.module}/index`, {
          ...val,
          ...this.params,
        });
      },
      deep: true,
    },
    params: {
      handler(val) {
        this.$store.dispatch(`${this.module}/index`, {
          ...val,
          ...this.options,
        });
      },
      deep: true,
      immediate: true,
    },
  },
};
</script>

