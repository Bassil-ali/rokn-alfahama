<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component heading="shippings" />

    <base-material-card
      icon="fas fa-clipboard"
      title="shippings"
      class="px-5 py-3"
    >
      <v-btn icon fab large dark color="red" to="/shipping/form">
        <v-icon large> fas fa-plus </v-icon>
      </v-btn>
      <data-table module="shipping" :params="{}" />
    </base-material-card>

    <div class="py-3" />
  </v-container>
</template>
<script>
export default {
  mounted() {},
};
</script>
