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

          <div class="search-menu">

            <form @submit.prevent="searchInItems(search_title)">
              <input
                v-model="search_title"
                type="text"
                :placeholder="$t('search_pro')"
              />
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
                <router-link to="/condition">{{ $t("Terms_of_use") }}</router-link>
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
            <div @click="togglling" id="toggle"></div>
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
                  <a target="_blank" href="/dashboard"><i class="fas fa-user-cog"></i></a>
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
                    ><i>{{ fav_items_count }}</i></router-link
                  >
                </div>
              </div>
              <div class="item-cart">
                <div class="d-flex">
                  <router-link to="/cart"
                    ><img
                      src="@/main/assets/images/shopping-cart.svg"
                      alt=""
                    /><span
                      >{{ $t("cart") }}
                      <strong>{{ order_total.toFixed(2) }}$</strong></span
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
      search_title: "",
      toggle: "",
      myNavbar: "",
    };
  },
  
  mounted() {
    if(this.locale == "ar"){
    document.title = 'ركن الفخامة | ' + this.$t(this.$route.name==null?'Home':this.$route.name,'ar');
    }else
    document.title = 'ruknalfakhamah | ' + this.$t(this.$route.name==null?'Home':this.$route.name,'en');

    this.$el.addEventListener("click", this.onClick);
    this.$store.dispatch("order/index");
  },
  computed: {
    ...mapState({
      user: (state) => state.auth.user,
      counter: (state) => state.cart.counter,
      order_total: (state) => state.cart.order_total || 0,
      locale: (state) => state.locales.locale,
      items: (state) => state.item.all || [],
    }),
    fav_items_count() {
      if (this.items[0]) {
        return this.items.filter((v) => v.liked).length;
      } else {
        return 0;
      }
    },
   
  },
  methods: {
    togglling() {
      this.$el.querySelector(`#toggle`).classList.toggle("active");
      this.$el.querySelector(`#primary-menu`).classList.toggle("active");
    },
    onClick(e) {
      if (e.target.id !== "toggle" && e.target.id !== "primary-menu") {
         this.$el.querySelector(`#toggle`).classList.remove("active");
        this.$el.querySelector(`#primary-menu`).classList.remove("active");
      }
    },
    searchInItems(title) {
      if (this.$route.name == "category") {
        this.$store.dispatch("item/index", { search: title });
      } else {
        this.$router.push({
          name: "category",
          query: { search: title },
        });
      }
    },
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
  beforeDestroy() {
    this.$el.removeEventListener("click", this.onClick);
  },
  
};

</script>
<style>
</style>
