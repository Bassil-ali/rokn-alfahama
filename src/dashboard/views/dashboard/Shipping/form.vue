<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component :heading="$t('shipping')" />

    <base-material-card
      icon="mdi-clipboard-text"
      title="shipping"
      class="px-5 py-3"
    >
      <form action="">
        <v-row>
          <v-col
            ><v-text-field label="name" v-model="item.name"></v-text-field
          ></v-col>
        </v-row>
      </form>
      <v-row>
        <v-col cols="12">
          <v-btn dark color="primary" block @click="save(item)">
            <v-icon> mdi-check </v-icon>
            {{ $t("save") }}
          </v-btn>
        </v-col>
      </v-row>
    </base-material-card>
  </v-container>
</template>
<script>
import { mapState } from "vuex";

export default {
  name: "ItemForm",
  data() {
    return {
      item: {},
    };
  },
  mounted() {
    // this.$store.dispatch("type/index");
    if (this.$route.params.id) {
      this.$store.dispatch("shipping/show", { id: this.$route.params.id });
    }
    this.$store.dispatch("shipping/index");
  },
  methods: {
    async save(item) {
      await this.$store.dispatch("shipping/store", item).then(() => {
          this.$router.push("/shipping");
        });
    },
  },

  computed: {
    ...mapState({
      // types: (state) => state.type.all,

      one: (state) => state.shipping.one,
    }),
  },
  watch: {
    one(val) {
      if (val) {
        this.item = JSON.parse(JSON.stringify(val));
        this.cover_image = this.item.cover_image;
      }
    },
  },
};
</script>