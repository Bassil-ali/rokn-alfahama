import Vue from 'vue'
import VueRouter from 'vue-router'
import routes_list from '../plugins/router_provider';
import auth from '../middleware/auth';
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue'),
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('../components/auth/Login.vue'),
  },
  {
    path: '/auth/:provider/callback',
    component: {
      template: '<div class="auth-component"></div>'
    }
  },
  {
    path: '/register',
    component: require('../components/auth/Register').default,
    name: 'register'
  },
  {
    path: '/reset_password',
    component: require('../components/auth/ResetPassword').default,
    name: 'reset_password'
  },
  {
    path: '/code_check',
    component: require('../components/auth/CodeCheck').default,
    name: 'code_check'
  },
  {
    path: '/new_password',
    component: require('../components/auth/NewPassword').default,
    name: 'new_password'
  },
  ...routes_list
]

const router = new VueRouter({
  mode: 'history',
  base: '/d',
  routes
})
router.beforeResolve(auth);

export default router
