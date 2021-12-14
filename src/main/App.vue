<template>
  <div>
    <!-- pageWrapper -->
    <site-header />
    <router-view></router-view>
    <site-footer />
  </div>
</template>

<script>
import { mapState } from "vuex";
import "./assets/js/bootstrap.bundle.min.js";
import jQuery from "jquery";
window.jQuery = jQuery;
export default {
  name: "App",

  data: () => ({
    logged_in: false,
  }),
  mounted() {
    if (!this.logged_in) {
      // this.$router.redirect("/login");
    }
    this.$vuetify.rtl = this.$store.state.rtl;
    this.$vuetify.locale = this.locale;
    this.$i18n.locale = this.locale;

    // window.FB.getLoginStatus(function (response) {
    //   console.log(response);
    // });
  },
  updated() {},
  computed: {
    ...mapState({
      // redirect: (state) => state.auth.redirect,
      locale: (state) => state.locales.locale,
      rtl: (state) => state.rtl,
      success_msg: (state) => state.success_msg,
      redirect: (state) => state.redirect,
    }),

    home() {
      return (
        this.$route.name == "Home" ||
        (this.$route.name == "home" && this.$vuetify.breakpoint.width > 600)
      );
    },
  },
  components: {
    DashboardCoreSettings: () => import("@/dashboard/components/core/Settings"),
  },
  watch: {
    // redirect: function (val) {
    //   console.log(val);
    //   if (val != "customer") this.$router.push("/dashboard");
    // },
    locale: function (val) {
      this.$vuetify.locale = val;
      this.$i18n.locale = val;
    },
    rtl: function (val) {
      this.$vuetify.rtl = val;
    },
    success_msg(val) {
      if (val) {
        this.$swal
          .fire({
            title: "Success",
            text: val,
            icon: "success",
            confirmButtonText: "Ok",
            confirmButtonColor: "#41b882",
          })
          .then(() => {
            if (this.redirect) {
              this.$router.push(this.redirect);
            }
            this.$store.dispatch("clearSuccessMsg");
          });
      }
    },
  },
};
</script>
<style>
@import "assets/css/bootstrap.rtl.min.css";
@import "assets/css/bootstrap-icons.css";
@import "assets/css/all.min.css";
@import "assets/css/style.css";
body {
  direction: rtl;
}
</style>
