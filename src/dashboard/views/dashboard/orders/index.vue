<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component heading="orders" />

    <base-material-card
      icon="fas fa-clipboard"
      title="orders_table"
      class="px-5 py-3"
    >
      <v-btn icon fab large dark color="red" to="/orders/form">
        <v-icon large> fas fa-plus </v-icon>
      </v-btn>
      <data-table module="order" :params="{}" />
    </base-material-card>

    <div class="py-3" />
  </v-container>
</template>
<script>
export default {
  mounted() {
  },
};
</script>
