<template>
  <div>
    <div class="entry-content about">
      <div class="Asection-01">
        <div class="container">
          <div class="head">
            <h2>{{ $t("about") }}</h2>
          </div>
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="content">
                <p>
                  {{ locale == 'ar' ? settings.who_us[0].content_ar:settings.who_us[0].content_en }}
                
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <figure class="main-img">
                <img v-if="settings.who_us[0].image_url" :src="settings.who_us[0].image_url" alt="" />
                <img v-else src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt="" />
              </figure>
            </div>
          </div>
        </div>
      </div>
      <div class="Asection-02">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <figure>
                <img v-if="settings.who_us[1].image_url" :src="settings.who_us[1].image_url" alt=""/>
                <img v-else src="@/main/assets/images/Image-21.jpg" alt="" />
              </figure>
            </div>
            <div class="col-md-7">
              <div class="content">
                <ul>
                  <li style="line-height:2em">
                     {{ locale == 'ar' ? settings.who_us[1].content_ar:settings.who_us[1].content_en }}
                  
                
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="Asection-03 section-03 categuory">
        <div class="container">
          <div class="head">
            <h2>{{ $t("Categories") }}</h2>
            <p>{{ $t("Shop_with_ease_by_categories") }}</p>
          </div>
          <div class="row">
            <div class="col">
              <div class="item">
                <a href="">
                  <figure>
                    <img src="@/main/assets/images/cat01.svg" alt="" />
                  </figure>
                  <span>عطور شرقية</span>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="item">
                <a href="">
                  <figure>
                    <img src="@/main/assets/images/cat02.svg" alt="" />
                  </figure>
                  <span>زيوت عصرية فاخرة</span>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="item">
                <a href="">
                  <figure>
                    <img src="@/main/assets/images/cat03.svg" alt="" />
                  </figure>
                  <span>بخور ومباخر عربية</span>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="item">
                <a href="">
                  <figure>
                    <img src="@/main/assets/images/cat04.svg" alt="" />
                  </figure>
                  <span>مستلزمات نسائية</span>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="item">
                <a href="">
                  <figure>
                    <img src="@/main/assets/images/cat05.svg" alt="" />
                  </figure>
                  <span>أزياء عربية للجنسين</span>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="item">
                <a href="">
                  <figure>
                    <img src="@/main/assets/images/cat06.svg" alt="" />
                  </figure>
                  <span>أحذية عربية وفضيات</span>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="item">
                <a href="">
                  <figure>
                    <img src="@/main/assets/images/cat07.svg" alt="" />
                  </figure>
                  <span>عسل</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  computed: {
    ...mapState({
      settings: (state) => state.settings,
      locale: (state) => state.locales.locale,
    }),
  },
};
</script>
