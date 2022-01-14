import i18n from './i18n/i18n'
export default {
    register: (resources) => {
        let modules = {};
        resources.map((resource) => {
            let state = {
                form_route: null,
                one: {},
                all: null,
                meta: {
                    current_page: 1
                },
                links: {},
                loaded: false,
                headers: [],
                errors: []
            };
            let getters = {
                all: state => state.all,
                one: state => state.one,
                headers: state => state.headers
            };
            let actions = {
                async index({ commit }, params) {

                    let parent_id = resource.parent ? params[resource.parent + `_id`] : '';

                    const response = await this.$axios.get(resource.parent ? `/${resource.parent}/${parent_id}/${resource.name}` : `/${resource.name}`, {
                        params: {
                            page: state?.meta?.current_page || 1,
                            ...params
                        }
                    });
                    console.log(resource);
                    console.log("resource");
                    console.log("resource");
                    console.log("resource");
                    if (resource.form_route) {
                        commit('setFormRoute', resource.form_route);
                    }
                    commit('setHeaders', resource.headers || []);
                    commit('setMeta', response.data.meta);
                    commit('setAll', response.data.data);
                    commit('setLinks', response.data.links);
                    commit('loadedData');
                    return response.data.data;
                },
                async show({
                    commit
                }, one) {
                    const response = await this.$axios.get(`/${resource.name}/${one.id}`);
                    commit('setOne', response.data.data);
                    return response.data.data;
                },
                async update({ commit, dispatch }, data) {
                    // let parent_id = data[resource.parent + '_id'];
                    let id = data.id;
                    if (data.is_file) {
                        let form_data = new FormData();
                        Object.keys(data).map(key => {
                            form_data.append(key, data[key])
                        });
                        data = form_data;
                    }
                    try {

                        const response = await this.$axios.put(`/${resource.name}/${id}`, data);
                        commit('setOne', response.data.data);
                        if (data.silent) return;
                        dispatch('setSuccessMsg', 'updated_successfully', {
                            root: true
                        })


                    } catch (exception) {
                        console.log(exception)
                    }
                },



                //  {
                //     locale: "ar",
                //     field: "description",
                //     value:'value'
                //   },

                async store({ commit, dispatch }, data) {
                    let post_data = {};

                    if (data.id) {
                        post_data = {};
                        data = Object.keys(data).map((key) => {
                            if (data[key])
                                post_data[key] = data[key];
                        });
                        dispatch("update", post_data);
                        return;
                    } else {

                        post_data = data;
                    }
                    // gallery_id  = 1
                    let parent_id = data[resource.parent + '_id'];
                    console.log(`A7AAAAAAAAAAAAAAA${parent_id}`)
                    if (data.is_file) {
                        console.log('aaa')
                        let form_data = new FormData();
                        Object.keys(data).map(key => {
                            form_data.append(key, data[key])
                        });
                        post_data = form_data;

                    }
                    console.log("post_data");
                    console.log(post_data);
                    console.log("post_data");
                    try {
                        const response = await this.$axios.post(`${resource.parent ? '/' + resource.parent + '/' + parent_id : ''}/${resource.name}`, post_data).then((data) => {
                            if (resource.no_success_msg) return data;
                            if (post_data.silent) return data;
                            dispatch('setSuccessMsg', 'added_successfully', {
                                root: true
                            })

                            return data;
                        });

                        commit('setOne', response.data);
                        return response.data.data;
                    } catch (ex) {
                        console.log(ex);
                        let errors = (ex.response.data.errors);
                        if (errors) {
                            commit('setErrors', errors, {
                                root: true
                            });
                        }
                    }
                },








                async delete({ commit, dispatch }, data) {

                    const response = await this.$axios.delete(`/${resource.name}/${data.id}`);
                    commit('setOne', response.data);
                    dispatch('index');
                },
                changeCurrentPage({
                    commit,
                    dispatch
                }, current_page) {
                    commit('setCurrentPage', current_page);
                    dispatch('index');
                },
                flipPage({ commit, dispatch }) {
                    commit('goNext');
                    dispatch('index');
                }

            };




            let mutations = {
                setAll: (state, all) => state.all = all,
                pushData: (state, data) => state.all = state.all.concat(data),
                setOne: (state, one) => state.one = one,
                setMeta: (state, meta) => state.meta = meta,
                goNext: (state) => state.meta.current_page += 1,
                setLinks: (state, links) => state.links = links,
                loadedData: (state) => state.loaded = true,
                setHeaders: (state, headers) => state.headers = headers,
                setErrors: (state, errors) => state.errors = errors,
                setCurrentPage: (state, page) => state.meta.current_page = page,
                setFormRoute: (state, formRoute) => state.form_route = formRoute
            }
            modules[resource.module_name || (resource.parent ? resource.parent + '_' : '') + resource.name] = {
                namespaced: true,
                state,
                getters,
                actions,
                mutations
            };
        });
        return modules;
    }
}
// export default modules;