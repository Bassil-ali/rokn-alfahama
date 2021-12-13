<template>
  <v-app>
    <dashboard-core-app-bar />

    <dashboard-core-drawer />

    <dashboard-core-view />

    <!-- <dashboard-core-settings /> -->

    <v-overlay :value="$store.state.overlay">
      <v-progress-circular indeterminate size="64"></v-progress-circular>
    </v-overlay>
    <v-snackbar
      :timeout="-1"
      :value="$store.state.get_alert"
      top
      centered
      justify-center
      dark
      color="transparent"
      class="elevation-0"
    >
      <v-row justify="center">
        <v-progress-circular indeterminate size="48"></v-progress-circular>
      </v-row>
    </v-snackbar>
    <v-snackbar
      :timeout="2000"
      :value="$store.state.post_alert"
      top
      centered
      justify-center
      dark
      color="green"
      class="elevation-0"
    >
      <v-row justify="center">
        {{ $t("process_done_successfully") }}
      </v-row>
    </v-snackbar>
    <v-snackbar
      :timeout="$store.state.error_timeout"
      :value="$store.state.post_fail_alert"
      top
      centered
      justify-center
      dark
      color="red"
      class="elevation-0"
    >
      <v-row justify="center">
        <ul>
          <li v-for="error in Object.keys($store.state.errors)">
            {{ $store.state.errors[error].reduce((c, n) => c + n + "\n") }}
          </li>
        </ul>
      </v-row>
    </v-snackbar>
  </v-app>
</template>

<script>
export default {
  name: "DashboardIndex",

  components: {
    DashboardCoreAppBar: () => import("@/dashboard/components/core/AppBar"),
    DashboardCoreDrawer: () => import("@/dashboard/components/core/Drawer"),
    DashboardCoreSettings: () => import("@/dashboard/components/core/Settings"),
    DashboardCoreView: () => import("@/dashboard/components/core/View"),
  },

  data: () => ({
    expandOnHover: false,
  }),
};
</script>
