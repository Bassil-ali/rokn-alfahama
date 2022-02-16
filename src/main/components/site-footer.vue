<template>
  <footer>
    <div class="top">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="item-footer">
              <div class="logo">
                <img src="@/main/assets/images/logo-w.svg" alt="" />
              </div>
              <div class="d-flex align-items-center">
                <span>{{ $t("follow_us_on") }}</span>
                <ul>
                  <li>
                    <a :href="settings.instgram" target="__blank"
                      ><i class="fab fa-instagram"></i
                    ></a>
                  </li>
                  <li>
                    <a :href="settings.facebook" target="__blank"
                      ><i class="fab fa-facebook-f"></i
                    ></a>
                  </li>
                </ul>
              </div>
              <figure class="logo-pay">
                <img src="@/main/assets/images/pay-logo.png" alt="" />
              </figure>
            </div>
          </div>
          <div class="col-md-3">
            <div class="item-footer">
              <h2>{{ $t("Connect_with_us") }}</h2>
              <ul class="menu">
                <li>
                  <i class="bi bi-telephone-fill"></i>
                  {{ settings.mobile || 9999 }}
                </li>
                <li>
                  <i class="bi bi-phone"></i> {{ settings.phone || 99999 }}
                </li>
                <li>
                  <i class="bi bi-envelope"></i>
                  {{ settings.contect_email || "Runalfakhamah@gmail.com" }}
                </li>
                <li>
                  <i class="bi bi-geo-alt-fill"></i>

                  {{
                    locale == "ar"
                      ? settings.address_ar
                      : settings.address_en ||
                        "  المملكة العربية السعودية - الدمام"
                  }}
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="item-footer">
              <h2>{{ $t("help") }}</h2>
              <ul class="menu">
                <li>
                  <router-link to="/about">
                    {{ $t("who_are_we") }}
                  </router-link>
                </li>
                <li>
                  <router-link to="/questions">
                    {{ $t("common_questions") }}
                  </router-link>
                </li>
                <li>
                  <router-link to="/contact-us">
                    {{ $t("Connect_with_us") }}
                  </router-link>
                </li>
                <li>
                  <router-link to="/">
                    {{ $t("home") }}
                  </router-link>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="item-footer">
              <h2>{{ $t("Categories") }}</h2>
              <ul class="menu">
                <li
                  :key="index"
                  v-for="(categorie, index) in categories.slice(0, 5)"
                >
                  <a :href="`/main/category/${categorie.id}`">{{
                    categorie.name
                  }}</a>
                </li>
                <!-- <li><a href="">زيوت عصرية فاخرة</a></li>
                <li><a href="">بخور ومباخر عربية</a></li>
                <li><a href="">مستلزمات نسائية</a></li>
                <li><a href="">أزياء عربية للجنسين</a></li>
                <li><a href="">أحذية عربية وفضيات</a></li>
                <li><a href="">عسل</a></li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="buttom">
      <div class="container">
        <p class="m-0 text-center">
          © {{ new Date().getFullYear() }} {{ $t("rokn_reserved") }}
        </p>
      </div>
    </div>
  </footer>
  <!-- <script>
        const toggle = document.getElementById('toggle');
        const myNavbar = document.getElementById('primary-menu');

        document.onclick = function(e) {
            if (e.target.id !== 'toggle' && e.target.id !== 'primary-menu') {
                toggle.classList.remove('active');
                myNavbar.classList.remove('active')
            }
        }

        toggle.onclick = function() {
            toggle.classList.toggle('active');
            myNavbar.classList.toggle('active')
        }
    </script> -->

  <!-- 
    <script src="@/main/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="@/main/assets/js/owl.carousel.min.js"></script>
    <script src="@/main/assets/js/app.js"></script> -->
</template>
<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      categories: [],
    };
  },
  mounted() {
    if (this.categories.length <= 0) {
      this.$store
        .dispatch("category/index", { null_parent_id: true })
        .then((data) => {
          this.categories = data;
        });
    }
  },
  computed: {
    ...mapState({
      settings: (state) => state.settings || [],
      // all_categories: (state) => state.category.all || [],
      locale: (state) => state.locales.locale || [],
    }),
  },
};
</script>
