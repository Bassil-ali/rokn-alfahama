<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component :heading="$t('user_form')" />
    <base-material-card
      icon="mdi-clipboard-text"
      title="user_form"
      class="px-5 py-3"
    >
      <v-form>
        <v-row>
          <v-col cols="3">
            <v-text-field
              v-model="item.name"
              :label="$t('full_name')"
              required
              dense
            />
          </v-col>
          <v-col cols="3">
            <v-text-field
              v-model="item.user_name"
              :label="$t('enter_username')"
              required
              dense
            />
          </v-col>
          <v-col cols="3">
            <v-text-field
              v-model="item.mobile"
              :label="$t('mobile_no')"
              required
              dense
            />
          </v-col>
          <v-col cols="3">
            <v-text-field
              v-model="item.email"
              :label="$t('email')"
              required
            ></v-text-field>
          </v-col>
          <v-col cols="3" v-if="!this.$route.params.id">
            <v-text-field
              v-model="item.password"
              :label="$t('password')"
              required
              dense
            />
          </v-col>
          <v-col cols="3">
            <v-text-field
              v-model="item.role_id"
              :label="$t('role_id')"
              required
              dense
            />
          </v-col>
        </v-row>
      </v-form>
    </base-material-card>
    <v-row>
      <v-col cols="12" v-if="!this.$route.params.id">
        <v-btn dark color="primary" block @click="save(item)">
          <v-icon> mdi-check </v-icon>
          {{ $t("save") }}
        </v-btn>
      </v-col>
       <v-col cols="12" v-if="this.$route.params.id">
        <v-btn dark color="primary" block @click="update(item)">
          <v-icon> mdi-check </v-icon>
          {{ $t("save") }}
        </v-btn>
      </v-col>
    </v-row>
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
    if (this.$route.params.id) {
      this.$store.dispatch("user/show", { id: this.$route.params.id });
    }
  },
  methods: {
    async save(item) {
      this.$store.dispatch("user/store", item).then(() => {
          this.$router.push("/users");
        });
    },
    async update(item) {
      item.dash =1;
      this.$store.dispatch("user/update", item).then(() => {
          this.$router.push("/users");
        });
    },
  },
  computed: {
    ...mapState({
      one: (state) => state.user.one,
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
