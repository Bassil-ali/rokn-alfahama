export default {
    data(){
        return {
            test:'asdsds'
        }
    },
    methods: {
        save(item,resource=null,redirect=null){
            console.log('mixins loaded');
            console.log(item);
            this.$store.dispatch(`${resource}/store`,item);
        }
    }
}