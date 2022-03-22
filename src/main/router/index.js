import Vue from 'vue'
import VueRouter from 'vue-router'
import test_auth from '../middleware/test_auth'
import routes_list from '../plugins/router_provider';
import auth from '../middleware/auth';
import i18n from '../../store/i18n/i18n'


Vue.use(VueRouter);
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
router.beforeEach((to, from, next) => {
  document.title = 'ruknalfakhamah | ' + i18n.t(to.name);
  next();
});
router.beforeResolve(auth);
export default router
