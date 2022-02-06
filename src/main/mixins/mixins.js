import { data } from "jquery";
import { mapState } from "vuex";

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


    },
    computed: {
        ...mapState({
            user: (state) => state.auth.user?.user || null,
            user_obj: (state) => state.auth.user,
        })
    },
    mounted() {

        if (!this.$root.user) {
            this.$store.dispatch("cart/loadLocal");
        }
    }

}