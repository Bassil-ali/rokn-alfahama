import { data } from "jquery";

export default {
    data() {
        return {
            test: 'asdsds'
        }
    },
    methods: {
        save(item, resource = null, redirect = null) {
            console.log('mixins loaded');

            if (item.id) {
                this.$store.dispatch(`${resource}/update`, item);
            } else {
                this.$store.dispatch(`${resource}/store`, item);
            }
            if (redirect) {
                this.$store.dispatch('setRedirect', redirect);
                redirect = null
            }
            // this.$store.dispatch(`${resource}/store`, item);

        },

        calcItemTotals(item) {
            return {
                item_price: item.selling_price,
                item_quantity: 1,
                item_id: item.id,
            }
        },
        calcOrderTotals(item) {
            return {

            }
        },
        async addToCartTest(item) {
            this.$store.dispatch('order/index').then((order_data) => {
                if (order_data.length == 0) {
                    let order = {}
                    order.discount = 0
                    order.item_quantity = 0
                    order.total = 0
                    order.shipment_price = 0
                    order.issue_date = new Date().toISOString().slice(0, 19).replace("T", " ");
                    order.status = 0;
                    order.taxed_total = 0

                    order.satus = 0;
                    let my_order = this.$store.dispatch('order/store', order).then((data) => {
                        return data
                    });
                    if (my_order.id) {
                        console.log("have id ")
                        this.$store.dispatch('order_item/store', {
                            order_id: my_order.id,
                            item_quantity: 1,
                            item_price: item.selling_price,
                            item_id: item.id,

                        })
                    }
                } else if (order_data.length == 1) {
                    let my_order = order_data[0]

                    if (my_order.id) {
                        let item_quantity = 1;
                        this.$store.dispatch('order_item/index').then((order_item) => {
                            let already_item = order_item.find(v => v.id == item.id)
                            if (already_item) {
                                item_quantity = already_item.item_quantity + 1
                            }
                        })
                        this.$store.dispatch('order_item/store', {
                            order_id: my_order.id,
                            item_price: 10,
                            item_quantity: item_quantity,
                            item_id: 1,

                        })
                    }
                } else {
                    console.log("the cart is full ")
                    return
                }
            });






        }

    }
}