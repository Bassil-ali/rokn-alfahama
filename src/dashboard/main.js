import Vue from 'vue'
// import FlagIcon from 'vue-flag-icon'
import App from './App.vue'
import router from './router'
import store from '../store'
import './plugins/base'
import './plugins/chartist'
import './plugins/vee-validate'
import vuetify from './plugins/vuetify'
import i18n from '../store/i18n/i18n'
import './plugins/registrar'
import ckeditor from './plugins/ckeditor';
import XLSX from "vue-excel-xlsx";
import mixins from './mixins/mixins';

Vue.use(XLSX);

Vue.config.productionTip = false
new Vue({
  mixins: [mixins],
  router,
  store,
  vuetify,
  i18n,
  ckeditor,
  render: h => h(App),
}).$mount('#app')

if (localStorage.user_data)
  store.dispatch('auth/load', JSON.parse(localStorage.user_data).user);

