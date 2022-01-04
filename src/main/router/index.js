import Vue from 'vue'
import VueRouter from 'vue-router'
import test_auth from '../middleware/test_auth'
import routes_list from '../plugins/router_provider';
import auth from '../middleware/auth';
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue'),

  },
  ...routes_list
]

const router = new VueRouter({
  mode: 'history',
  base: 'main',
  routes
})
router.beforeResolve(auth);

export default router
