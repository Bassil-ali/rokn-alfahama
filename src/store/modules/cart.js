const state = {
    items: [],
    order: { items: [] },
    counter: 0
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
            let ex_item = state.order.items.find((i) => i.id == item.id);
            if (ex_item == undefined) {
                let item_data = {
                    item_id: item.id,
                    order_id: state.order.id,
                    item_quantity: item.item_quantity || 1,
                    name: item.name,
                    image: item.image,
                    item_price: item.selling_price,
                    // offer_id: item.offer.id,
                    // discount: item.offer ? (item.offer.percentge / 100) * item.selling_price : 0,
                }
                commit('add_item', item_data)
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
    removeItem({ commit }, item) {
        this.$axios.delete(`/order/${state.order.id}/item/${item.item_id}`, item)
        commit('remove_item', item)
    },
    incrementItem({ commit, state, dispatch }, item) {
        let item_s = state.order.items.find(i => i.id == item.id)
        item_s.item_quantity++;
        state.counter++;
        this.$axios.put(`/order/${state.order.id}/item/${item_s.item_id}`, item_s).then(() => {
            // dispatch('load');
        })
        // commit('increment_item', item)
    },
    decrementItem({
        commit
    }, item) {
        let item_s = state.order.items.find(i => i.id == item.id)
        if (item.item_quantity == 1) return;
        item_s.item_quantity--;
        state.counter--;
        this.$axios.put(`/order/${state.order.id}/item/${item_s.item_id}`, item_s).then(() => {
            // dispatch('load');
        })
        // commit('decrement_item', item)
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
    async load({ commit }) {
        const response = await this.$axios.get('/order', { status: 0 })
        let count = response.data.data[0].items.reduce((c, n) => {
            return c + n.item_quantity
        }, 0)
        commit('set_counter', count)
        commit('set_draft_order', { ...response.data.data[0] });
    },
    // async craeteOrder({ commit }) {

    //     const response = await this.$axios.post('/order', { status: 0 });
    //     commit('set_draft_order', response.data.data);
    // },
    sync({ state, dispatch }, item_data) {
        this.$axios.post(`/order/${state.order.id}/item`, item_data).then(() => {
            dispatch('load');
        });

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
        let index = state.items.findIndex(x => x.id == item.id);
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

}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}