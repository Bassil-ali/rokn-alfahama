const state = {
    items: [],
    counter: 0
};
const getters = {
    all: state => state.posts
};
const actions = {
    addItem({
        commit,
        state
    }, item) {
        let ex_item = state.items.find((i) => i.id == item.id);
        if (ex_item == undefined) {
            let item_data = {
                item_quantity: item.item_quantity || 1,
                name: item.name,
                image: item.image,
                item_price: item.selling_price,
            }
            // item.qty = item.qty || 1;
            commit('add_item', item_data);
        } else {
            commit('increment_item', ex_item);
        }
    },
    removeItem({
        commit
    }, item) {
        commit('remove_item', item)
    },
    incrementItem({
        commit
    }, item) {
        commit('increment_item', item)
    },
    decrementItem({
        commit
    }, item) {
        commit('decrement_item', item)
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
    }
}
const mutations = {
    add_item: (state, item) => {
        state.items.push(item)
        state.counter += item.item_quantity;
    },
    increment_item: (state, item) => {
        let item_s = state.items.find(i => i.id == item.id)
        item_s.item_quantity++;
        state.counter++;
    },
    decrement_item: (state, item) => {
        let item_s = state.items.find(i => i.id == item.id)
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
        state.counter -= item.item_quantity;
        if (index > -1)
            state.items.splice(index, 1)
    },
    set_discount: (state, discount) => {
        state.items.map(i => i.discount = discount);
    }

}
export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}