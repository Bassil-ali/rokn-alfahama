<template>
  <div :class="locale == 'en' ? 'ltr-class' : ''">
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
    localStorage.getItem("locale") == "ar"
      ? (document.body.style.direction = "rtl")
      : (document.body.style.direction = "ltr");
    this.$vuetify.rtl = this.$store.state.rtl;
    this.$vuetify.locale = this.locale;
    this.$i18n.locale = this.locale;

    // window.FB.getLoginStatus(function (response) {
    //   console.log(response);
    // });
    this.$store.dispatch("setting/index");
  },
  updated() {},
  computed: {
    ...mapState({
      // redirect: (state) => state.auth.redirect,
      locale: (state) => state.locales.locale,
      rtl: (state) => state.rtl,
      success_msg: (state) => state.success_msg,
      redirect: (state) => state.redirect,
      all_settings: (state) => state.setting.all,
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
    all_settings(val) {
      if (val) {
        let newItem = JSON.parse(JSON.stringify(val));
        let paresedSettings = newItem
          .map((i) => {
            return { [i.key]: i.value };
          })
          .reduce((c, n) => {
            return { ...c, ...n };
          });
        this.$store.dispatch("setSettings", paresedSettings);
      }
    },
    // redirect: function (val) {
    //   console.log(val);
    //   if (val != "customer") this.$router.push("/dashboard");
    // },
    locale: function (val) {
      this.$vuetify.locale = val;
      this.$i18n.locale = val;
      val == "ar"
        ? (document.body.style.direction = "rtl")
        : (document.body.style.direction = "ltr");
    },
    rtl: function (val) {
      this.$vuetify.rtl = val;
    },
    success_msg(val) {
      if (val) {
        this.$swal
          .fire({
            title: this.$t("success"),
            text: this.$t(val),
            icon: "success",
            confirmButtonText: this.$t("Ok"),
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
  created() {
    var locale = localStorage.getItem("locale");
    if (!locale) localStorage.setItem("locale", "en");
  },
};
</script>
<style>
@import "assets/css/bootstrap.rtl.min.css";
@import "assets/css/bootstrap-icons.css";
@import "assets/css/all.min.css";
@import "assets/css/style.css";
</style>

<style lang="scss">
.ltr-class {
  @import "assets/css/style.ltr.scss";
}
</style>
