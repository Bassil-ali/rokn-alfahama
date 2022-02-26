<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component :heading="$t('taxes_form')" />

    <base-material-card
      icon="mdi-clipboard-text"
      title="taxes_form"
      class="px-5 py-3"
    >
      <v-form>
        <v-row>
          <v-col cols="3">
            <v-text-field v-model="item.name" :label="$t('name')" dense />
          </v-col>
          <v-col cols="3">
            <v-text-field v-model="item.percentage" :label="$t('percentage')" dense />
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-btn dark color="primary" block @click="save(item)">
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
import { mapActions, mapState } from "vuex";
export default {
  name: "ItemForm",
  data() {
    return {
      item: {},
    };
  },
  mounted() {
        if(this.$route.params.id){
    this.$store.dispatch("tax/show",{id:this.$route.params.id});

    }
    if (this.$props.item.id) {
      this.$store
        .dispatch("unit/show", { id: this.$props.item.id })
        .then((res) => {});
    }
  },
  methods: {
    async save(item) {
      this.$store.dispatch('tax/store',item).then(() => {
          this.$router.push("/taxes");
        });
    },
  },
  computed:{
    ...mapState({
      one:state=>state.tax.one
    })
  },
  watch:{
    one(val){
      if(val){
        this.item = JSON.parse(JSON.stringify(val));
      }
    }
  }
};
</script>