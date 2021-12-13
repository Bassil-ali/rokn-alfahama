import Vue from 'vue'
import Router from 'vue-router'
import routes from './routes_mapper';
import auth from './middleware/auth'
Vue.use(Router)

let router = new Router({
  mode: 'history',
  base: '/dashboard/',
  routes: [
    {
      path: '/',
      component: () => import('@/dashboard/views/dashboard/Index'),
      children: [
        // Dashboard
        {
          name: 'Dashboard',
          path: '',
          component: () => import('@/dashboard/views/dashboard/Dashboard'),
        },
        // Pages
        // {
        //   name: 'User Profile',
        //   path: 'pages/user',
        //   component: () => import('@/dashboard/views/dashboard/pages/UserProfile'),
        // },
        // Tables
        // Maps
        // {
        //   name: 'Google Maps',
        //   path: 'maps/google-maps',
        //   component: () => import('@/dashboard/views/dashboard/maps/GoogleMaps'),
        // },
        ...routes
      ],
    },
  ],
})
router.beforeResolve(auth);
export default router;