<template>

    <header>
        <div class="container">
            <div class="logo-container">
                <div class="d-flex align-items-center">
                    <div class="logo">
                        <a href=""><img src="@/main/assets/images/logo.png" alt=""></a>
                    </div>
                    <div class="search-menu">
                        <form action="">
                            <input type="text" placeholder="$t('search_pro')">
                            <button type="submit"><i class="bi bi-search"></i></button>
                        </form>
                        <ul id="primary-menu">
                            <li><router-link to="/">{{$t('home')}}</router-link></li>
                            <li><router-link to="/catagory">{{$t('category')}}</router-link></li>
                            <li><router-link to="/offers">{{$t('Offers')}}</router-link></li>
                            <li><router-link to="/about">{{$t('about')}}</router-link></li>
                            <li><router-link to="/contact_us">{{$t('contact')}}</router-link></li>
                            <li><router-link to="/questions">{{$t('common_questions')}}</router-link></li>
                        </ul>
                        <div id="toggle"></div>
                    </div>
                    <div class="user-area">
                        <div class="user-login-reg" v-if="!user">
                            <span><img src="@/main/assets/images/user.svg" alt=""></span>
                            <ul>
                                <li><router-link to="/login">{{$t('Login')}}</router-link></li>
                                <li><router-link to="/register">{{$t('Create_account')}}</router-link></li>
                                <li><a href="/dashboard"><i class="fas fa-cat"></i></a> </li>
                            </ul>
                        </div>
                        <div class="user-login-reg" v-else>
                            <ul>
                                <li><span class="name">{{user.name}}</span></li>
                                <li><span class="user"><img src="@/main/assets/images/user.jpg" alt=""></span></li>
                                 <li><router-link to="/login">{{$t('Login')}}</router-link></li>
                                <li><router-link to="/register">{{$t('Create_account')}}</router-link></li>
                            </ul>
                        </div>
                        <div class="option-user d-flex">
                            <div class="item-cart">
                                <div class="d-flex">
                                    <router-link to="/favorite"><img src="@/main/assets/images/001-heart.svg" alt=""><span>{{$t('Favorite')}}</span><i>{{user?user.reaction_count:0}}</i></router-link>
                                </div>
                            </div>
                            <div class="item-cart">
                                <div class="d-flex">
                                    <router-link to="/cart"><img src="@/main/assets/images/shopping-cart.svg" alt=""><span>{{$t('cart')}} <strong>0.00$</strong></span><i>{{counter}}</i></router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
import { mapState } from 'vuex'
export default {
    computed:{
        ...mapState({
            user:state=>state.auth.user,
            counter:state=>state.cart.counter
        })
    }
}
</script>
<style>

</style>
