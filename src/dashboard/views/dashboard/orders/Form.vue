<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component heading="orders_form" />

    <base-material-card
      icon="mdi-clipboard-text"
      title="Item Form"
      class="px-5 py-3"
    >
      <v-form>
        <v-row>
          <v-col cols="3">
            <v-autocomplete
              :items="users"
              item-text="name"
              item-value="id"
              v-model="item.user_id"
              :label="$t('customer')"
            />
          </v-col>
          <v-col cols="3">
            <v-autocomplete
              :items="taxes"
              item-text="name"
              @change="setTax($event, item)"
              :label="$t('tax')"
              return-object
            />
          </v-col>
          <v-col cols="3"> </v-col>
          <v-col cols="3">
            <v-card>
              <v-card-title>
                {{ $t("summary") }}
              </v-card-title>
              <v-card-text>
                <v-row>
                  <v-col cols="6">
                    {{ $t("total") }}
                  </v-col>
                  <v-col cols="6">
                    {{ (item.total = total) }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="6">
                    {{ $t("discount") }}
                  </v-col>
                  <v-col cols="6">
                    {{ (item.discount = total_discount) }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="6">
                    {{ $t("tax") }}
                  </v-col>
                  <v-col cols="6">
                    {{ (item.tax = total_tax) }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col cols="6">
                    {{ $t("taxed_total") }}
                  </v-col>
                  <v-col cols="6">
                    {{ (item.taxed_total = taxed_total) }}
                  </v-col>
                </v-row>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-card>
              <v-btn
                block
                @click="
                  all.push({ item_price: 0, discount: 0, item_quantity: 0 })
                "
                v-if="all.length == 0"
              >
                <v-icon> mdi-plus </v-icon>
                {{ $t("click_here_to_add_items") }}
              </v-btn>
              <v-simple-table v-else>
                <thead>
                  <tr>
                    <th class="primary--text">
                      {{ $t("item") }}
                    </th>
                    <th class="primary--text">
                      {{ $t("unit_price") }}
                    </th>
                    <th class="primary--text">
                      {{ $t("quantity") }}
                    </th>
                    <th class="primary--text">{{ $t("discount") }}%</th>
                    <th class="primary--text">
                      {{ $t("price") }}
                    </th>

                    <th>
                      <v-btn @click="all.push({})" icon>
                        <v-icon>fas fa-plus</v-icon>
                      </v-btn>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  <tr v-for="(one, index) in all">
                    <td>
                      <v-autocomplete
                        :items="items"
                        item-text="name"
                        return-object
                        @change="item_changed($event, one)"
                        single-line
                      />
                    </td>
                    <td>
                      <v-text-field
                        v-model.number="one.item_price"
                        single-line
                      />
                    </td>
                    <td>
                      <v-text-field
                        v-model.number="one.item_quantity"
                        single-line
                      />
                    </td>
                    <td>
                      <v-text-field v-model.number="one.discount" single-line />
                    </td>
                    <td>
                      {{
                        (one.total =
                          one.item_price *
                            one.item_quantity *
                            (1 - one.discount / 100) || 0)
                      }}
                    </td>
                    <td>
                      <v-btn icon @click="all.splice(index, 1)">
                        <v-icon> fas fa-times </v-icon>
                      </v-btn>
                    </td>
                  </tr>
                </tbody>
              </v-simple-table>
            </v-card>
          </v-col>
        </v-row>
        <v-row v-if="all.length > 0">
          <v-col cols="12">
            <v-btn dark color="primary" block @click="save">
              <v-icon> mdi-check </v-icon>
              {{ $t("save") }}
            </v-btn>
          </v-col>
        </v-row>
      </v-form>
    </base-material-card>
  </v-container>
</template>
<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      images: [],
      all: [],
      tax: {},
      map_dialog: false,
      location: {},
      item: {
        status: 0,
        issue_date: new Date(Date.now()),
        discount_amount: 0,
      },
    };
  },
  mounted() {
    this.$store.dispatch("item/index");
    this.$store.dispatch("tax/index");
    this.$store.dispatch("user/index");
  },
  methods: {
    async save() {
      let order = await this.$store.dispatch("order/store", this.item);
      all_promises = this.all.map((purchase) => {
        purchase.order_id = order.id;
        return this.$store.dispatch("order_item/store", purchase);
      });
      await Promise.all(all_promises);
      order.status=1;
      await this.$store.dispatch('order/update',order);
    },
    item_changed(item, list_item) {
      list_item.item_quantity = 1;
      list_item.item_price = item.selling_price;
      list_item.item_id = item.id;
    },
    setTax(tax, item) {
      this.tax = tax;
      item.tax_id = tax.id;
    },
  },
  computed: {
    ...mapState({
      items: (state) => state.item.all,
      users: (state) => state.user.all,
      taxes: (state) => state.tax.all,
    }),
    total() {
      return this.all.reduce(
        (c, n) =>
          c + n.item_price * n.item_quantity * (1 - (n.discount || 0) / 100),
        0
      ); // * (1+this.item.tax?this.item.tax.percentage/100 : 0);
    },
    total_discount() {
      return this.all.reduce(
        (c, n) =>
          c + n.item_price * n.item_quantity * ((n.discount || 0) / 100),
        0
      ); // * (1+this.item.tax?this.item.tax.percentage/100 : 0);
    },
    total_tax() {
      return this.all.reduce(
        (c, n) =>
          c +
          n.item_price * n.item_quantity * ((this.tax.percentage || 0) / 100),
        0
      ); // * (1+this.item.tax?this.item.tax.percentage/100 : 0);
    },
    taxed_total() {
      return this.total_tax + this.total;
    },
  },
};
</script>