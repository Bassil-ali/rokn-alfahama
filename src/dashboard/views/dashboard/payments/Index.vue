<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component heading="payments"/>
    
    <base-material-card
      icon="mdi-clipboard-text"
      title="payments_table"
      class="px-5 py-3"
    >
       <data-table module="payment" :params="{}" />
    </base-material-card>

    <div class="py-3" />
  </v-container>
</template>
<script>
import { mapState } from "vuex";
export default {
  mounted() {
    this.$store.dispatch("payment/index");
  },
  computed: {
    ...mapState({
      all: (state) => state.payment.all,
      headers: (state) => state.payment.headers,
    }),
  },
};
</script>
