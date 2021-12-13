<template>
  <v-row
    justify="center"
    dense
    style="justify-content: center; margin-bottom: 20px"
  >
    <v-overlay :value="true"></v-overlay>
  </v-row>
</template>
<script>
import { mapActions, mapState } from "vuex";
export default {
  props: ["token"],
  data() {
    return {
      user: {
        email: "",
        password: "",
      },
      email: {
        label: "Email",
      },
      password: {
        label: "Password",
      },
      FB: window.FB,
    };
  },
  methods: {
    ...mapActions("auth", ["login"]),
    loginViaToken() {
      let token = this.$route.params.token;
      this.$store.dispatch("auth/loadUserFromSocialToken", token);
    },
  },
  computed: {
    ...mapState({
      loggedIn: (state) => state.auth.user != null,
    }),
  },
  watch: {
    loggedIn: function (val) {
      if (val) {
        this.$router.push("/");
      }
    },
  },
  mounted() {
    console.log(this.$route.params);
    if (this.$route.params.token) this.loginViaToken(this.$route.params.token);
  },
};
</script>