<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component heading="payments_form" />

    <base-material-card
      icon="mdi-clipboard-text"
      title="payments_Form"
      class="px-5 py-3"
    >
      <v-form>
        <v-row>
          <v-col cols="3">
            <v-autocomplete
              :items="orders"
              item-text="id"
              item-value="id"
              v-model="item.order_id"
              :label="$t('order')"
            />
          </v-col>
          <v-col cols="3">
            <v-text-field :label="$t('amount')" v-model.number="item.amount" />
          </v-col>
          <v-col cols="3">
            <v-menu
              v-model="menu1"
              :close-on-content-click="false"
              :nudge-right="40"
              transition="scale-transition"
              offset-y
              min-width="auto"
            >
              <template v-slot:activator="{ on, attrs }">
                <v-text-field
                  v-model="item.date"
                  label="Picker without buttons"
                  prepend-icon="mdi-calendar"
                  readonly
                  v-bind="attrs"
                  v-on="on"
                ></v-text-field>
              </template>
              <v-date-picker
                v-model="item.date"
                @input="menu1 = false"
              ></v-date-picker>
            </v-menu>
          </v-col>
        </v-row>
        <v-row v-if="item.amount && item.order_id">
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
import { mapState } from "vuex";
export default {
  data() {
    return {
      item: {},
      menu1:false
    };
  },
  mounted() {
        if(this.$route.params.id){
    this.$store.dispatch("payment/show",{id:this.$route.params.id});

    }
    this.$store.dispatch("order/index");
    // this.$store.dispatch("user/index");
  },
  methods: {
    save(item) {
      this.$store.dispatch("order_payment/store", item)
      .then(() => {
          this.$router.push("/payments");
        });
    },
  },
  computed: {
    ...mapState({
      users: (state) => state.user.all,
      orders: (state) => state.order.all,
      one: (state) => state.payment.all,
    }),
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