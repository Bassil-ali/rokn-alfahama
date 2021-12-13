module_generator = (resource, parent_resource) => {

    const state = {
        category: {},
        categories: [],
        post_get: false,
        meta: {
            current_page: 1
        },
        links: {}
    };
    const getters = {
        categories: state => state.categories,
        category: state => state.category

    };
    const actions = {
        async index({
            commit
        }) {
            const response = await this.$axios.get(`/${resource}`);
            commit("setAll", response.data.data);
        },
        async store({
            commit
        }, category) {
            const response = await this.$axios.post(`/${resource}`, category);
            commit("setOne", response.data);
        },
        async show({
            commit
        }, category) {
            const response = await this.$axios.get(`/${resource}/${category.id}`);
            commit('setCategory', response.data);
        },
        async update({
            commit
        }, category) {
            const response = await this.$axios.update(`/${resource}/${category.id}`);
            commit('setCategory', response.data);
        },
        async delete({
            commit
        }, category) {
            const response = await this.$axios.delete(`/${resource}/${category.id}`);
            commit("setOne", response.data);

        },
        changeCurrentPage({
            commit
        }, current_page) {
            commit('setCurrentPage', current_page);
        },
        flipPage({
            commit,
            dispatch
        }) {
            commit('goNext');
            dispatch('getPosts');
        }
    }
    const mutations = {
        setAll: (state, posts) => state.posts = posts,
        pushPosts: (state, posts) => state.posts = state.posts.concat(posts),
        newPost: (state, post) => state.posts.push(post),
        setCategory: (state, category) => state.category = category,
        setMeta: (state, meta) => state.meta = meta,
        goNext: (state) => state.meta.current_page += 1,
        setLinks: (state, links) => state.links = links,
    }
    return {
        namespaced: true,
        state,
        getters,
        actions,
        mutations
    }
}