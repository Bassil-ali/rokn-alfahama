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

        }
    }
}