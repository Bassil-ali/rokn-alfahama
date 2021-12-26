<template>
    <div class="entry-content cart-empty">
        <div class="entry-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="text-center">
                            <figure><img src="@/main/assets/images/undraw_empty_cart_co35.svg" alt=""></figure>
                            <h3>{{$t('Your_cart_is_empty')}}</h3>
                            <p>{{$('go_to_option')}}</p>
                            <a href="" class="button">{{$t('Continue_shopping')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>
<script>
export default {
    
}
</script>
