<template>
  <v-container id="regular-tables" fluid tag="section">
    <center>
      <!-- <v-btn
        color="blue-grey"
        class="ma-2 white--text"
        @click="export_invoice(items)"
      >
        {{ $t("pdf invoice") }}
      </v-btn> -->
    </center>
    <br />
    <v-simple-table>
      <thead>
        <tr>
          <th class="primary--text">
            {{ $t("item_name") }}
          </th>
          <th class="primary--text">
            {{ $t("image") }}
          </th>
          <th class="primary--text">
            {{ $t("quantity") }}
          </th>
          <th class="primary--text">{{ $t("discount") }}%</th>
          <th class="primary--text">
            {{ $t("tax_percentage") }}
          </th>
          <th class="primary--text">
            {{ $t("item price") }}
          </th>
        </tr>
      </thead>

      <tbody>
        <tr :key="index" v-for="(one, index) in items">
          <td>
            {{ one.item_name }}
          </td>
          <td>
            <v-img
           
              :src="`${one.image}`"
              height="100"
              width="100"
              contain
              class="grey darken-4  rounded-pill"
            ></v-img>
          </td>
          <td>
            {{ one.item_quantity }}
          </td>
          <td>
            {{ one.discount }}
          </td>
          <td>
            {{ one.tax_percentage ? one.tax_percentage : 0 }}
          </td>
          <td>
            {{ one.item_price }}
          </td>
        </tr>
      </tbody>
    </v-simple-table>
  </v-container>
</template>

<script>

import { mapState } from "vuex";


export default {
  data() {
    return {
      invoiceBase64: "",
      all: [],
    };
  },
  mounted() {
    if (this.$route.params.id) {
      this.$store.dispatch("orderitem/index", {
        order_id: this.$route.params.id,
      });
      this.$store.dispatch("order/show", {
        id: this.$route.params.id,
      });
    }
  },

  computed: {
    ...mapState({
      items: (state) => state.orderitem.all,
      one: (state) => state.order.one,
    }),
  },
  methods: {
    //  export_invoice(items) {
    
    // },
    
  },
  watch: {
    one(val) {
      if (val) {
        this.item = JSON.parse(JSON.stringify(val));
      }
    },
  },
};
</script>