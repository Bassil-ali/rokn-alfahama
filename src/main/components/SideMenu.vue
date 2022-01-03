<template>
  <ul class="menu-user">
    <li>
      <router-link
        to="/my-account/change_info"
        :class="`${$route.params.id == 'change_info' ? 'active' : ''}`"
        ><span><img src="assets/images/user-icon.svg" alt="" /></span>
        {{ $t("my_info") }}</router-link
      >
    </li>
    <li>
      <router-link
        to="/my-account/order_history"
        :class="`${$route.params.id == 'order_history' ? 'active' : ''}`"
        ><span><img src="assets/images/history.svg" alt="" /></span>
        {{ $t("older orders") }}</router-link
      >
    </li>
    <li>
      <router-link
        to="/my-account/my_addresses"
        :class="`${$route.params.id == 'my_addresses' ? 'active' : ''}`"
        ><span><img src="assets/images/address.svg" alt="" /></span>
        {{ $t("my addresses") }}</router-link
      >
    </li>
    <li>
      <router-link
        to="/my-account/change_password"
        :class="`${$route.params.id == 'change_password' ? 'active' : ''}`"
        ><span><img src="assets/images/006-close-envelope.svg" alt="" /></span>
        {{ $t("change password") }}</router-link
      >
    </li>
    <li>
      <a
        href="/main"
        @click="logout()"
        :class="`${$route.params.id == 'logout' ? 'active' : ''}`"
        ><span><img src="assets/images/logout.svg" alt="" /></span>
        {{ $t("logout") }}</a
      >
    </li>
  </ul>
</template>
<script>
export default {
  methods: {
    logout() {
      localStorage.clear();
    },
  },
};
</script>
<style>
a.active {
  border-color: var(--c2) !important;
  background: #c9982014;
}
</style>