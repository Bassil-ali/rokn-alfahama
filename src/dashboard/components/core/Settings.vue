<template>
  <div id="settings-wrapper">
    <v-card
      id="settings"
      class="py-2 px-4"
      color="rgba(0, 0, 0, .3)"
      dark
      flat
      link
      min-width="100"
      :style="`position: fixed; top: 115px; ${
        $vuetify.rtl ? 'left' : 'right'
      }: -35px; border-radius: 8px;`"
    >
      <v-icon large> fas fa-cog </v-icon>
    </v-card>

    <v-menu
      v-model="menu"
      :close-on-content-click="false"
      activator="#settings"
      bottom
      content-class="v-settings"
      :left="!$vuetify.rtl"
      :nudge-left="$vuetify.rtl?0:8"
      :nudge-right="!$vuetify.rtl?0:8"
      offset-x
      :origin="`top ${$vuetify.rtl ? 'left' : 'right'}`"
      transition="scale-transition"
    >
      <v-card class="text-center mb-0" width="300">
        <v-card-text>
          <v-divider class="my-4 secondary" />

          <v-row align="center" no-gutters>
            <v-col cols="auto">
              {{ $t("dark_mode") }}
            </v-col>

            <v-spacer />

            <v-col cols="auto">
              <v-switch
                v-model="$vuetify.theme.dark"
                class="ma-0 pa-0"
                color="secondary"
                hide-details
              />
            </v-col>
          </v-row>
          <v-row align="center" no-gutters>
            <v-col cols="auto">
              {{ $t("rtl") }}
            </v-col>

            <v-spacer />

            <v-col cols="auto">
              <v-switch
                v-model="rtl"
                class="ma-0 pa-0"
                color="secondary"
                hide-details
              />
            </v-col>
          </v-row>

          <v-divider class="my-4 secondary" />

          <v-row align="center" no-gutters>
          
            <v-spacer />

            <v-col cols="auto">
              <v-select
                :items="available_locales"
                item-text="native_name"
                item-value="iso_639"
                @change="changeLocale"
                :label="$t('Chose_Language')"
              >
              </v-select>
            </v-col>
          </v-row>

          <v-divider class="my-4 secondary" />
        </v-card-text>
      </v-card>
    </v-menu>
  </div>
</template>

<script>
// Mixins
import Proxyable from "vuetify/lib/mixins/proxyable";
import { mapMutations, mapState } from "vuex";

export default {
  name: "DashboardCoreSettings",

  mixins: [Proxyable],

  data: () => ({
    color: "#E91E63",
    colors: ["#9C27b0", "#00CAE3", "#4CAF50", "#ff9800", "#E91E63", "#FF5252"],
    image:
      "https://demos.creative-tim.com/material-dashboard/assets/img/sidebar-1.jpg",
    images: [
      "https://demos.creative-tim.com/material-dashboard/assets/img/sidebar-1.jpg",
      "https://demos.creative-tim.com/material-dashboard/assets/img/sidebar-2.jpg",
      "https://demos.creative-tim.com/material-dashboard/assets/img/sidebar-3.jpg",
      "https://demos.creative-tim.com/material-dashboard/assets/img/sidebar-4.jpg",
    ],
    menu: false,
    saveImage: "",
    showImg: true,
    rtl:false
  }),

  watch: {
    color(val) {
      this.$vuetify.theme.themes[this.isDark ? "dark" : "light"].primary = val;
    },
    showImg(val) {
      if (!val) {
        this.saveImage = this.barImage;
        this.setBarImage("");
      } else if (this.saveImage) {
        this.setBarImage(this.saveImage);
        this.saveImage = "";
      } else {
        this.setBarImage(val);
      }
    },
    image(val) {
      this.setBarImage(val);
    },
  },

  methods: {
    ...mapMutations({
      setBarImage: "SET_BAR_IMAGE",
    }),
    changeLocale(val){
      this.$store.dispatch("locales/change",val);
      this.$i18n.locale = val;
      localStorage.setItem("locale",val);
    }
  },
  computed: {
    ...mapState({
      types: (state) => state.type.all,
      categories: (state) => state.category.all,
      available_locales: (state) => state.locales.available_locales,
    }),
  },
  mounted() {
    this.$store.dispatch("locales/index");
  },
  watch:{
    rtl:{
      handler(val){
        this.$vuetify.rtl = val;
        localStorage.setItem("rtl",val);
      }
    }
  }
};
</script>

