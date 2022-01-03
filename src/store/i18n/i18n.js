import Vue from 'vue'
import VueI18n from 'vue-i18n'
import en from 'vuetify/lib/locale/en'
import ar from 'vuetify/lib/locale/ar';
import store from '../';
Vue.use(VueI18n)

const messages = {
  en: {
    ...require('./locales/en.json'),
    $vuetify: en,
  },
  ar: {
    ...require('./locales/ar.json'),
    $vuetify: ar
  }
}

export default new VueI18n({
  locale: store?.state?.locale || 'en',
  fallbackLocale: 'en',
  messages,
})