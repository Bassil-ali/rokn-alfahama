const state = {
    result: {
        posts:[],
        items:[]
    }
};
const getters = {
    result: state => state.result
};
const actions = {
    index({
        commit
    }, data) {
        this.$axios.get('/search', {
            params:data
        }).then((response) => {
            commit('setResult', response.data);
            
        }).catch(err => {
            commit('setErrors', err);
        });
    },
}
const mutations = {
    setResult: (state, data) => {
        state.result = data;
        // state.token = data.token;
    },
}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}