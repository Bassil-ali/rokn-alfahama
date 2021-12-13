import Vue from 'vue'
import Vuetify from 'vuetify/lib'
import i18n from '@/store/i18n/i18n'
import '@/dashboard/sass/overrides.sass'
import '@fortawesome/fontawesome-free/css/all.css'
Vue.use(Vuetify)

const theme = {
  primary: '#4CAF50',
  secondary: '#9C27b0',
  accent: '#9C27b0',
  info: '#00CAE3',
}

export default new Vuetify({
  lang: {
    t: (key, ...params) => i18n.t(key, params),
  },
  theme: {
    themes: {
      dark: theme,
      light: theme,
    },
  },
  icons:{
    iconfont:'fa'
  }
})
