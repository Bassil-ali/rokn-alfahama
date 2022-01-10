<template>
  <header>
    <div class="container">
      <div class="logo-container">
        <div class="d-flex align-items-center">
          <div class="logo">
            <a href="/main"
              ><img src="@/main/assets/images/logo.png" alt=""
            /></a>
          </div>
          <div v-if="toggleMenu" id="mobile-menu">
            <ul>
              <li>
                <a href="/main">{{ $t("home") }}</a>
              </li>
              <li>
                <a href="/main/category">{{ $t("category") }}</a>
              </li>
              <li>
                <a href="/main/offers">{{ $t("Offers") }}</a>
              </li>
              <li>
                <a href="/main/about">{{ $t("about") }}</a>
              </li>
              <li>
                <a href="/main/contact-us">{{ $t("contact") }}</a>
              </li>
              <li>
                <a href="/main/questions">{{ $t("common_questions") }}</a>
              </li>
            </ul>
          </div>
          <div class="search-menu">
            <form action="">
              <input type="text" :placeholder="$t('search_pro')" />
              <button type="submit"><i class="bi bi-search"></i></button>
            </form>
            <ul id="primary-menu">
              <li>
                <router-link to="/">{{ $t("home") }}</router-link>
              </li>
              <li>
                <router-link to="/category">{{ $t("category") }}</router-link>
              </li>
              <li>
                <router-link to="/offers">{{ $t("Offers") }}</router-link>
              </li>
              <li>
                <router-link to="/about">{{ $t("about") }}</router-link>
              </li>
              <li>
                <router-link to="/contact-us">{{ $t("contact") }}</router-link>
              </li>
              <li>
                <router-link to="/questions">{{
                  $t("common_questions")
                }}</router-link>
              </li>
            </ul>
            <div @click="toggleMenu = !toggleMenu" id="toggle"></div>
          </div>
          <div class="user-area">
            <div class="user-login-reg" v-if="!user">
              <span><img src="@/main/assets/images/user.svg" alt="" /></span>
              <ul>
                <li>
                  <router-link to="/login">{{ $t("Login") }}</router-link>
                </li>
                <li>
                  <router-link to="/register">{{
                    $t("Create_account")
                  }}</router-link>
                </li>
                <li>
                  <a @click="switchLocale()" style="cursor: pointer">
                    {{ $t(locale == "ar" ? "en" : "ar") }}
                  </a>
                </li>
              </ul>
            </div>
            <div class="user-login-reg" v-else>
              <ul>
                <li>
                  <span class="name">{{ user.user.user_name }}</span>
                </li>
                <li>
                  <a href="/main/my-account/change_info" class="user"
                    ><img src="@/main/assets/images/user.jpg" alt=""
                  /></a>
                </li>
                <li v-show="user.user.role_id == 1 ? true : false">
                  <a href="/dashboard"><i class="fas fa-user-cog"></i></a>
                </li>
                <li>
                  <a href="/main" @click="logout()"
                    ><i class="fas fa-sign-out-alt"></i
                  ></a>
                </li>
                <li>
                  <a @click="switchLocale()" style="cursor: pointer">
                    {{ $t(locale == "ar" ? "en" : "ar") }}
                  </a>
                </li>
                <!-- <li><router-link to="/login">{{$t('Login')}}</router-link></li>
                                <li><router-link to="/register">{{$t('Create_account')}}</router-link></li> -->
              </ul>
            </div>
            <div class="option-user d-flex">
              <div class="item-cart">
                <div class="d-flex">
                  <router-link to="/favorite"
                    ><img
                      src="@/main/assets/images/001-heart.svg"
                      alt=""
                    /><span>{{ $t("Favorite") }}</span
                    ><i>{{ user ? user.reaction_count : 0 }}</i></router-link
                  >
                </div>
              </div>
              <div class="item-cart">
                <div class="d-flex">
                  <router-link to="/cart"
                    ><img
                      src="@/main/assets/images/shopping-cart.svg"
                      alt=""
                    /><span>{{ $t("cart") }} <strong>0.00$</strong></span
                    ><i>{{ counter }}</i></router-link
                  >
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
import { mapState } from "vuex";
export default {
  data() {
    return {
      toggleMenu: false,
    };
  },
  mounted() {
    this.$store.dispatch("order/index");
  },
  computed: {
    ...mapState({
      user: (state) => state.auth.user,
      counter: (state) => state.cart.counter,
      locale: (state) => state.locales.locale,
    }),
  },
  methods: {
    logout() {
      this.$store.dispatch("auth/unload");
      // localStorage.clear();
    },
    switchLocale() {
      window.location.reload();
      this.$store.dispatch("locales/change", this.locale == "ar" ? "en" : "ar");
    },
  },
  watch: {
    locale(val) {
      localStorage.setItem("locale", val);
    },
  },
};
</script>
<style>
</style>
