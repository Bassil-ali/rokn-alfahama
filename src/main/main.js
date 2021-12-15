import Vue from 'vue'
import VueMeta from 'vue-meta'
// import FlagIcon from 'vue-flag-icon'
import './registerServiceWorker'
import router from './router'
import store from '../store'
import vuetify from './plugins/vuetify';
import './plugins/registrar';
import App from './App.vue'
import i18n from '../store/i18n/i18n'
Vue.config.productionTip = false;
import VuePhoneNumberInput from 'vue-phone-number-input';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';
import mixins from './mixins/mixins';
import sweatAleart from './plugins/sweet_alert';
Vue.component('vue-phone-number-input', VuePhoneNumberInput);
Vue.prototype.jQuery = jQuery;
Vue.use(VueMeta)
Vue.use(sweatAleart)
// Vue.use(FlagIcon);
new Vue({
  mixins: [mixins],
  router,
  store,
  vuetify,
  i18n,
  render: h => h(App)
}).$mount('#app')
if (localStorage.user_data)
  store.dispatch('auth/load', JSON.parse(localStorage.user_data).user);