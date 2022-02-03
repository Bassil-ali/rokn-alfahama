<template>
  <v-container id="regular-tables" fluid tag="section">
    <base-v-component heading="contact" />

    <base-material-card
      icon="fas fa-clipboard"
      title="contact"
      class="px-5 py-3"
    >
      <v-row>
        <v-col cols="6" md="3"
          ><v-text-field
            readonly
            :value="item.id"
            :label="$t('number')"
            dense
          ></v-text-field
        ></v-col>
        <v-col cols="6" md="3" v-if="item.user_id"
          ><v-text-field
            readonly
            :value="item.user.name"
            :label="$t('user_id')"
            dense
          ></v-text-field
        ></v-col>
        <v-col cols="6" md="3"
          ><v-text-field
            readonly
            :value="item.name"
            :label="$t('name')"
            dense
          ></v-text-field
        ></v-col>
        <v-col cols="6" md="3"
          ><v-text-field
            readonly
            :value="item.email"
            :label="$t('email')"
            dense
          ></v-text-field
        ></v-col>
        <v-col cols="6" md="3"
          ><v-text-field
            readonly
            :value="item.subject"
            :label="$t('subject')"
            dense
          ></v-text-field
        ></v-col>
        <v-col cols="6" md="3"
          ><v-text-field
            readonly
            :value="item.created_at"
            :label="$t('created_at')"
            dense
          ></v-text-field
        ></v-col>
        <v-col cols="6" md="6"
          ><v-textarea
            readonly
            :value="item.message"
            :label="$t('message')"
            dense
          ></v-textarea
        ></v-col>
      </v-row>
    </base-material-card>

    <div class="py-3" />
  </v-container>
</template>
<script>
import { mapState } from "vuex";
export default {
  mounted() {
    if (this.$route.params.id) {
      this.$store.dispatch("contact/show", { id: this.$route.params.id });
    } else {
      this.$router.push("/contact");
    }
  },

  computed: {
    ...mapState({
      item: (state) => state.contact.one || {},
    }),
  },
};
</script>
