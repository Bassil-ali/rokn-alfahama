<template>
  <div>
    <v-dialog width="fit-content" v-model="dialog">
      <v-card width="500"
        ><v-card-title>
          {{ $t("are you sure you want to delete") }} ?
        </v-card-title>
        <v-card-actions class="justify-center">
          <v-btn
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
      :headers="translateHeaders((headers || []).concat('actions'))"
      :items="data || []"
      :options.sync="options"
      :page.sync="options.page"
      item-key="id"
      :items-per-page="meta.per_page ? Number(meta.per_page) : -1"
      class="elevation-1"
      :sort-by.sync="options.sortBy"
      :sort-desc.sync="options.sortDesc"
      multi-sort
      v-bind="$attrs"
      :search="search"
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
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
        ></v-text-field>
        <v-btn class="ma-2" color="success" @click="exportxclx">
         {{$t('export_excl')}}
        </v-btn>
        <!-- <v-btn icon @click="expordt(data)">few</v-btn> -->
      </template>
      <template v-for="(_, slot) of $scopedSlots" v-slot:[slot]="scope"
        ><slot :name="slot" v-bind="scope"
      /></template>

      <template v-slot:item.actions="{ item }">
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
    navigate_to_form(item) {
     if(this.module == 'discount'||this.module== 'coupon')
      this.$router.push(`${this.form_route}/${item.code}`);
      else
      this.$router.push(`${this.form_route}/${item.id}`);
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
