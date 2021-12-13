<template>
  <div class="main_wrapper" :dir="rtl ? 'rtl' : 'ltr'">
    <router-view />
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
  name: "App",
  metaInfo() {
    return {
      title: "Epiloge - Build your network in your field of interest",
      meta: [
        { name: "description", content: "aaa" },
        {
          property: "og:title",
          content: "Epiloge - Build your network in your field of interest",
        },
        { property: "og:site_name", content: "Epiloge" },
        { property: "og:type", content: "website" },
        { name: "robots", content: "index,follow" },
      ],
    };
  },
  mounted() {
    this.$vuetify.rtl = this.rtl||this.locale=='ar';
    this.$i18n.locale = this.locale;
    this.$vuetify.locale = this.locale;
  },

  computed: {
    ...mapState({
      locale: (state) => state.locales.locale,
      rtl: (state) => state.rtl,
    }),
  },
  watch: {
    locale: function (val) {
      this.$vuetify.locale = val;
      this.$i18n.locale = val;
    },
    rtl: function (val) {
      this.$vuetify.rtl = this.locale == "ar" ? true : val;
    },
  },
};
</script>
<style>
@import url("https://fonts.googleapis.com/css2?family=Cairo:wght@400&display=swap");
body,h1,.v-application {
  font-family: "Cairo" !important;
}
.main_wrapper[dir="rtl"] p,.main_wrapper[dir="rtl"] div,.main_wrapper[dir="rtl"] span {
  text-align: right;
}
</style>