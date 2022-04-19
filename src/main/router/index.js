import Vue from 'vue'
import VueRouter from 'vue-router'
import Meta from 'vue-meta'
import test_auth from '../middleware/test_auth'
import routes_list from '../plugins/router_provider';
import auth from '../middleware/auth';
import i18n from '../../store/i18n/i18n'


Vue.use(VueRouter);
Vue.use(Meta);

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue'),

  },
  ...routes_list
]
console.log(i18n);
const router = new VueRouter({
  mode: 'history',
  base: 'main',
  routes
})
Vue.use(Meta, {
  keyName: 'metaInfo',
  attribute: 'data-vue-meta',
  ssrAttribute: 'data-vue-meta-server-rendered',
  tagIDKeyName: 'vmid',
  refreshOnceOnNavigation: true
});
let locale = localStorage.getItem("locale");

router.beforeEach((to, from, next) => {
  if(locale == 'en')
  document.title = 'ruknalfakhamah | ' + i18n.t(to.name);
  else
  document.title = 'ركن الفخامة | ' + i18n.t(to.name);
  next();
});
router.beforeResolve(auth);
export default router
