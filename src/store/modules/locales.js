const LocalesList = require('locales-list').default;

// console.log(LocalesList.getAll());
let locale = navigator.language
let state = {
    all: [],
    available_locales: [{
        native_name: 'العربية',
        iso_639: 'ar'
    }, {
        native_name: 'English',
        iso_639: 'en'
    }],
    loaded: false,
    locale: 'en'
};

let getters = {
    all: state => state.all,
};

let actions = {
    async index({
        commit
    }, params) {

        commit('setAll', LocalesList.getAll());
        commit('loadedData');
    },
    
    async change({
        commit
    }, locale) {
        localStorage.setItem("locale", locale);
        commit('setLocale', locale);
    }

};
let mutations = {
    setAll: (state, all) => state.all = all,
    loadedData: (state) => state.loaded = true,
    setLocale: (state, locale) => state.locale = locale
}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};