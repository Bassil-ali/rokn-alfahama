import Vue from 'vue'
import VueAxios from 'vue-axios'
import VueSocialauth from 'vue-social-auth'
import axios from 'axios';
 
Vue.use(VueAxios,axios);
Vue.use(VueSocialauth, {
 
  providers: {
    facebook: {
      clientId: '152204063514919',
      redirectUri: 'https://planttree.ps/auth/facebook/callback' // Your client app URL
    },
    google: {
      clientId: '1053682836849-m3uiaq945d2hrq6s2h0d759dg17842i0.apps.googleusercontent.com',
      redirectUri: 'https://planttree.ps/auth/google/callback' // Your client app URL
    }
  }
});
export default VueSocialauth;