<template>
  <v-data-table
    :headers="translateHeaders(headers)"
    :items="data"
    :options.sync="options"
    :page.sync="options.page"
    item-key="id"
    :items-per-page="meta.per_page ? Number(meta.per_page) : -1"
    class="elevation-1"
    :sort-by.sync="options.sortBy"
    :sort-desc.sync="options.sortDesc"
    multi-sort
    v-bind="$attrs"
    v-on="$listeners"
  >
    <template v-for="(_, slot) of $scopedSlots" v-slot:[slot]="scope"
      ><slot :name="slot" v-bind="scope"
    /></template>
  </v-data-table>
</template>
<script>
import { mapState } from "vuex";
export default {
  name: "data-table",
  props: {
    module: String,
    params: Object,
  },
  data() {
    return {
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
    }),
  },
  methods: {
    translateHeaders(headers) {
      return headers.map((i) => {
        return {
          text: this.$t(i),
          value: i,
        };
      });
    },
  },
};
</script>