<template>

  <v-navigation-drawer
    id="core-navigation-drawer"
    v-model="drawer"
    :dark="barColor !== 'rgba(228, 226, 226, 1), rgba(255, 255, 255, 0.7)'"
    :expand-on-hover="expandOnHover"
    :right="$vuetify.rtl"
    :src="barImage"
    mobile-break-point="960"
    app
    width="260"
    v-bind="$attrs"
  >
    <template v-slot:img="props">
      <v-img :gradient="`to bottom, ${barColor}`" v-bind="props" />
    </template>

    <v-divider class="mb-1" />
    <v-list dense nav>
      <v-list-item>
        <v-list-item-avatar class="align-self-center" color="white" contain>
          <v-img
            src="@/main/assets/images/logo.png"
            max-height="30"
          />
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title class="display-2" v-text="user.user.user_name" style="" />
        </v-list-item-content>
      </v-list-item>
    </v-list>

    <v-divider class="mb-2" />

    <v-list expand nav>
      <!-- Style cascading bug  -->
      <!-- https://github.com/vuetifyjs/vuetify/pull/8574 -->
      <div />

     <template v-for="(item, i) in computedItems">
       <template v-if="check(item.to)">
        <base-item-group v-if="item.children" :key="`group-${i}`" :item="item">
          <!--  -->
        </base-item-group>

        <base-item v-else :key="`item-${i}`" :item="item" />
       </template>
       
      </template>
     

      <!-- Style cascading bug  -->
      <!-- https://github.com/vuetifyjs/vuetify/pull/8574 -->
      <div />
    </v-list>

    <!-- <template v-slot:append>
      <base-item
        :item="{
          title: $t('upgrade'),
          icon: 'mdi-package-up',
          to: '/upgrade',
        }"
      />
    </template> -->
  </v-navigation-drawer>
</template>

<script>
// Utilities
import { mapState } from "vuex";
import admin_menu from "@/dashboard/menus/admin";
import customer_menu from "@/dashboard/menus/customer";
import gardner_menu from "@/dashboard/menus/gardner";
export default {
  name: "DashboardCoreDrawer",

  props: {
    expandOnHover: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      items: [],
    };
  },
  mounted() {
     this.$store.dispatch("user/show", { id: this.user.user.id });

    if (!this.user) {
      // document.location = '/';
    } else {
      }
      let menus = {
        customer: customer_menu,
        admin: admin_menu,
        gardner: gardner_menu,
      };
      this.items = menus['admin'];
  },
  computed: {
    ...mapState(["barColor", "barImage"]),
    drawer: {
      get() {

        return this.$store.state.drawer;
      },
      set(val) {
        this.$store.commit("SET_DRAWER", val);
      },
    },
    computedItems() {
      if (this.items) return this.items.map(this.mapItem)
      
      else return [];
    },
    profile() {
      return {
        avatar: true,
        title: this.$t("avatar"),
      };
    },
    ...mapState({
      user: (state) => state.auth.user,
      perm: (state) => state.user.one,
    }),
    
  },
  methods: {
    mapItem(item) {
      return {
        ...item,
        children: item.children ? item.children.map(this.mapItem) : undefined,
        title: this.$t(item.title),
      };
    },
    check(page){
      let r =  page.substring(1);
      if(this.perm.permissions == null){
        return true
      }
     let per =  this.perm.permissions.split(" ");
     for(var i = 0;i<per.length;i++){
       if(`${per[i]}` == r){
         return true
       }
     }
    }
  },
};
</script>

<style lang="sass">
@import '~vuetify/src/styles/tools/_rtl.sass'

#core-navigation-drawer
  .v-list-group__header.v-list-item--active:before
    opacity: .24

    .v-list-item
      &__icon--text,
      &__icon:first-child
        justify-content: center
        text-align: center
        width: 20px

        +ltr()
          margin-right: 24px
          margin-left: 12px !important

        +rtl()
          margin-left: 24px
          margin-right: 12px !important

    .v-list--dense
      .v-list-item
        &__icon--text,
        &__icon:first-child
          margin-top: 10px

    .v-list-group--sub-group
      .v-list-item
        +ltr()
          padding-left: 8px

        +rtl()
          padding-right: 8px

      .v-list-group__header
        +ltr()
          padding-right: 0

        +rtl()
          padding-right: 0

        .v-list-item__icon--text
          margin-top: 19px
          order: 0

        .v-list-group__header__prepend-icon
          order: 2

          +ltr()
            margin-right: 8px

          +rtl()
            margin-left: 8px
</style>
