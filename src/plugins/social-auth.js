import Vue from 'vue'
import VueAxios from 'vue-axios'
import VueSocialauth from 'vue-social-auth'
import axios from 'axios';
 
Vue.use(VueAxios,axios);
Vue.use(VueSocialauth, {
 
  providers: {
    github: {
      clientId: 'fcb63a516ce0df9e42c5abc0e7b1ecd5',
      redirectUri: '/auth/github/callback' // Your client app URL
    },
    facebook: {
      clientId: '',
      redirectUri: '/auth/github/callback' // Your client app URL
    },
  }
});
export default VueSocialauth;