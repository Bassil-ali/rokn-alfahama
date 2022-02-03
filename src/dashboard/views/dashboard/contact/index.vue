<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component heading="contact" />

    <base-material-card
      icon="fas fa-clipboard"
      title="contact_table"
      class="px-5 py-3"
    >
      <data-table module="contact" :params="{}" />
    </base-material-card>

    <div class="py-3" />
  </v-container>
</template>
<script>
export default {
  mounted() {},
};
</script>
