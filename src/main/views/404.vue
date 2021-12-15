<template>
   
    <div class="entry-content page-404 position-relative">
        <div class="container">
            <div class="content text-center">
                <h3>404</h3>
                <h1>{{$t('This_page_is_not_available')}}</h1>
                <p>{{$t('this_page_not_found')}}</p>
                <a href="" class="button">{{$t('dashboard')}}</a>
                <div class="socail d-flex">
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="contact-information  d-flex">
                    <span><i class="fas fa-phone"></i> 966123456789</span>
                    <span><i class="far fa-envelope"></i> Runalfakhamah@gmail.com</span>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    mounted(){
        console.log('aaaa');
    }
}
</script>
