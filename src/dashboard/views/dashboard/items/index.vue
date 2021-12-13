<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component heading="items" />

    <base-material-card
      icon="fas fa-clipboard"
      title="items_table"
      class="px-5 py-3"
    >
      <v-btn icon fab large dark color="red" to="/items/form">
        <v-icon large> fas fa-plus </v-icon>
      </v-btn>
      <data-table module="item" :params="{}" />
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
