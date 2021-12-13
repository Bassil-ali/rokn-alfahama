<template>
  <ul class="menu-user">
    <li>
      <router-link to="/my-account/change_info" :class="`${$route.params.id=='change_info'?'active':''}`"
        ><span><img src="assets/images/user-icon.svg" alt="" /></span>
        معلوماتي</router-link
      >
    </li>
    <li>
      <router-link to="/my-account/order_history"
       :class="`${$route.params.id=='order_history'?'active':''}`"
        ><span><img src="assets/images/history.svg" alt="" /></span> تاريخ
        الطلب</router-link
      >
    </li>
    <li>
      <router-link to="/my-account/my_addresses"
      :class="`${$route.params.id=='my_addresses'?'active':''}`"
        ><span><img src="assets/images/address.svg" alt="" /></span> عناويني</router-link
      >
    </li>
    <li>
      <router-link to="/my-account/change_password"
      :class="`${$route.params.id=='change_password'?'active':''}`"
        ><span><img src="assets/images/006-close-envelope.svg" alt="" /></span>
        تغير كلمة المرور</router-link
      >
    </li>
    <li>
      <a href=""
      :class="`${$route.params.id=='logout'?'active':''}`"
        ><span><img src="assets/images/logout.svg" alt="" /></span> تسجيل
        الخروج</a
      >
    </li>
  </ul>
</template>
<style>
a.active {
  border-color: var(--c2) !important;
  background: #c9982014;
}
</style>