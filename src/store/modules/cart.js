const state = {
    items: [],
    order: { items: [] },
    counter: 0,
    order_total: 0,
};
const getters = {
    all: state => state.posts
};
const actions = {
    async addItem({
        commit,
        state,
        dispatch
    }, item) {
        if (state.order.items && state.order.id) {
            let ex_item = state.order.items.find((i) => i.item_id == item.id);
            if (!ex_item) {
                let item_data = {
                    item_id: item.id,
                    order_id: state.order.id,
                    item_quantity: item.item_quantity || 1,
                    name: item.name,
                    image: item.image,
                    item_price: item.selling_price,
                    offer_id: item.offer ? item.offer.id : undefined,
                    discount: item.offer ? (item.offer.percentage / 100) * item.selling_price : 0,
                }
                commit('add_item', item_data)
                commit('mut_set_order_total')
                dispatch('sync', item_data)
            } else {
                dispatch('incrementItem', ex_item)
            }
        } else {
            dispatch("order/store", { total: 0, discount: 0, taxed_total: 0, status: 0, issue_date: new Date().toISOString().slice(0, 19).replace("T", " ") }, { root: true }).then(() => {
                dispatch("load").then(() => {
                    dispatch("addItem", item)
                })
            })


        }

    },
    removeItem({ commit, state }, item) {
        this.$axios.delete(`/order/${state.order.id}/item/${item.item_id}`, item).then(() => {
            if (state.order.id) {
                dispatch('order/store', { ...state.order, silent: true }, { root: true })
            }
        })
        commit('remove_item', item)
        commit('mut_set_order_total')

    },
    incrementItem({ commit, state, dispatch }, item) {
        let item_s = state.order.items.find(i => i.id == item.id)
        item_s.item_quantity++;
        state.counter++;
        this.$axios.put(`/order/${state.order.id}/item/${item_s.item_id}`, item_s).then(() => {
            if (state.order.id) {
                dispatch('order/store', { ...state.order, silent: true }, { root: true })
            }
        })
        commit('mut_set_order_total')
    },
    decrementItem({
        commit,
        state
    }, item) {
        let item_s = state.order.items.find(i => i.id == item.id)
        if (item.item_quantity == 1) return;
        item_s.item_quantity--;
        state.counter--;
        this.$axios.put(`/order/${state.order.id}/item/${item_s.item_id}`, item_s).then(() => {
            if (state.order.id) {
                dispatch('order/store', { ...state.order, silent: true }, { root: true })
            }
        })
        commit('mut_set_order_total')

    },
    updateQuantity({
        commit
    }, item) {
        commit('update_quantity', item);
    },
    setDiscount({
        commit
    }, discount) {
        commit('set_discount', discount);
    },
    async load({ commit, rootState }) {
        const response = await this.$axios.get('/order', { params: { status: 0, user_id: rootState.auth.user.user.id } })

        let count = response.data.data.length > 0 ? response.data.data[0].items.reduce((c, n) => {
            return c + n.item_quantity
        }, 0) : 0
        commit('set_counter', count)
        commit('set_draft_order', { ...response.data.data[0] });
        commit('mut_set_order_total')

    },
    // async craeteOrder({ commit }) {

    //     const response = await this.$axios.post('/order', { status: 0 });
    //     commit('set_draft_order', response.data.data);
    // },
    sync({ state, dispatch, commit }, item_data) {
        this.$axios.post(`/order/${state.order.id}/item`, { ...item_data, silent: true }).then(() => {
            dispatch('load').then(() => {
                commit('mut_set_order_total')
                console.log("im in the sync")
                if (state.order.id) {
                    dispatch('order/store', { ...state.order, silent: true }, { root: true })
                }
            });
        });


    },
    addOrderTotalPrice({ commit }, total) {
        commit('mut_add_total_price', total)

    },
    reSetCartTotal({ commit }) {
        commit('mut_reset_cart_total')

    }
}
const mutations = {
    add_item: (state, item) => {
        state.order.items.push(item)
        state.counter += item.item_quantity;
    },
    increment_item: (state, item) => {
        let item_s = state.order.items.find(i => i.id == item.id)
        item_s.item_quantity++;
        state.counter++;
        return item_s;
    },
    decrement_item: (state, item) => {
        let item_s = state.oreder.items.find(i => i.id == item.id)
        if (item.item_quantity == 0) return;
        item_s.item_quantity--;
        state.counter--;
    },
    update_quantity: (state, item) => {
        state.items.find(i => i.id == item.id).item_quantity = item.item_quantity;
        state.counter += item.item_quantity;
    },
    remove_item: (state, item) => {
        let index = state.order.items.findIndex(x => x.id == item.id);
        if (item.item_quantity >= 1)
            state.counter -= item.item_quantity;
        if (index > -1)
            state.order.items.splice(index, 1)
    },
    set_discount: (state, discount) => {
        state.items.map(i => i.discount = discount);
    },
    set_draft_order(state, draft_orders) {
        state.order = draft_orders
    },
    set_counter(state, count) {
        state.counter = count
    },
    mut_add_total_price(state, totalPrice) {
        state.order_total = totalPrice
    },
    mut_set_order_total(state) {
        state.order_total = state.order.items ? state.order.items.reduce((c, n) => c + n.item_price * n.item_quantity - n.discount, 0) : 0
    },
    mut_reset_cart_total(state) {
        stete.order = { items: [] }
        state.order_total = 0
    },

}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}