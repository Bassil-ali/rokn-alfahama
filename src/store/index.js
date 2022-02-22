import Vue from 'vue'
import router from '../main/router/index'
import Vuex from 'vuex'
import modules from './modules';
import axios from '../plugins/axios';
import registrar from './module_registrar';
import resources from './resources';
let r_modules = registrar.register(resources);
let locale = localStorage.getItem("locale") || 'en';
let rtl = locale == 'ar';
// console.log(locale + " "+rtl);
Vue.use(Vuex)
let store = new Vuex.Store({
  state: {
    overlay: false,
    get_alert: false,
    post_alert: false,
    post_fail_alert: false,
    category: [],
    theme: {
      dark: true,
    },
    rtl,
    barColor: 'rgba(0, 0, 0, .8), rgba(0, 0, 0, .8)',
    barImage: 'https://demos.creative-tim.com/material-dashboard/assets/img/sidebar-1.jpg',
    drawer: null,
    errors: [],
    error_timeout: 2000,
    success_timeout: 2000,
    locale,
    redirect: null,
    success_msg: null,
    settings: null
  },
  mutations: {

    SET_BAR_IMAGE(state, payload) {
      state.barImage = payload
    },
    SET_DRAWER(state, payload) {
      state.drawer = payload
    },
    setErrors(state, errors) {
      state.errors = errors;
      state.post_fail_alert = true;
      setTimeout(() => {
        state.errors = [];
        state.post_fail_alert = false;
      }, state.error_timeout)
    },
    setLocale(state, locale) {
      state.locale = locale;
    },
    setSuccessMsg: (state, msg) => {
      state.success_msg = msg;
    },
    clearSuccessMsg: (state) => {
      state.success_msg = null;
      state.redirect = null;
    },
    setRedirect: (state, redirect) => {
      state.redirect = redirect;
    },
    set_settings: (state, settings) => {
      state.settings = settings;
    },

  },
  actions: {
    updateLocale({
      commit
    }, data) {
      commit('setLocale', data);
    },
    setSuccessMsg({ commit }, msg) {
      commit('setSuccessMsg', msg);
    },
    clearSuccessMsg({ commit }) {
      commit('clearSuccessMsg');
    },
    setRedirect({ commit }, redirect) {
      commit('setRedirect', redirect);
    },
    setSettings({ commit }, settings) {
      commit('set_settings', settings);
    },

  },
  modules: {
    ...modules,
    ...r_modules
  },
  $axios: axios
})
axios.interceptors.response.use(
  (response) => {
    store.state.overlay = false;
    setTimeout(() => {
      store.state.get_alert = false;
    }, 2000)
    if (response.status == 401) {
      router.push('/login')
      store.dispatch("auth/unload")
    };
    if ((response.status == 200 || response.status == 201) && response.config.method == 'post' || response.config.method == 'options') {
      store.state.post_alert = true;
      setTimeout(() => {
        store.state.post_alert = false;
      }, store.state.success_timeout);
    }
    return response;
  },
  (error) => {
    store.state.overlay = false;
    store.state.get_alert = false;
    if (error.response)
      if (error.response.status == 401) {
        store.dispatch("auth/unload");
      }
    return Promise.reject(error);
  }
);
axios.interceptors.request.use(
  (config) => {
    // console.log(config);
    config.headers['Content-Language'] = store.state.locales.locale;
    if (config.method != "get")
      store.state.overlay = true;
    else
      store.state.get_alert = true;
    return config;
  },
  (error) => {
    store.state.overlay = false;
    store.state.get_alert = false;
    return Promise.reject(error);
  }
);
store.$axios = axios;
export default store;