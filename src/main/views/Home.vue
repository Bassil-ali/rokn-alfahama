
<template>
  <div>
    <div class="intro">
      <span class="decor"></span>
      <div class="">
        <div class="item">
          <div class="right">
            <img
              class="right"
              src="@/main/assets/images/Send-gift-bro.png"
              alt=""
            />
            <div class="caption">
              <h3>{{ $t("Stand_out_with_your_style") }}</h3>
              <h2>{{ $t("with_corner") }}</h2>
            </div>
          </div>
          <div class="left">
            <img src="@/main/assets/images/OBJECTS.png" alt="" />
          </div>
        </div>
      </div>
    </div>

    <div class="section-01">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="item text-center">
              <figure>
                <img src="@/main/assets/images/headphones.svg" alt="" />
              </figure>
              <h3>{{ $t("support_and_help") }}</h3>
              <p>{{ $t("Customer_service") }}</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item text-center">
              <figure>
                <img src="@/main/assets/images/shipped.svg" alt="" />
              </figure>
              <h3>{{ $t("free delivery") }}</h3>
              <p>{{ $t("Free_delivery_if") }}</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item text-center">
              <figure>
                <img src="@/main/assets/images/discount.svg" alt="" />
              </figure>
              <h3>{{ $t("permanent_offers") }}</h3>
              <p>{{ $t("discount_offer") }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-02 product">
      <div class="container">
        <div class="head">
          <h2>{{ $t("latest_product") }}</h2>
        </div>
        <carousel
          v-if="test"
          :nav="false"
          :responsive="{
            0: { items: 1, nav: false },
            600: { items: 3, nav: false },
          }"
          :margin="5"
          :items="3"
          :dots="false"
          dir="ltr"
          :autoplay="true"
        >
          <div class="item" v-for="item in recent_items" :key="item.id">
            <product :item="item" />
          </div>
        </carousel>
      </div>
    </div>

    <div class="section-03 categuory">
      <div class="container">
        <div class="head">
          <h2>{{ $t("category") }}</h2>
          <p>{{ $t("Shop_with_ease_by_categories") }}</p>
        </div>
        <div class="row">
          <div class="col" v-for="category in categories" :key="category.id">
            <category :item="category" />
          </div>
        </div>
      </div>
    </div>

    <div class="section-04 banners">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <a href="" class="item"
              ><img src="@/main/assets/images/banner01.jpg" alt=""
            /></a>
          </div>
          <div class="col-md-6">
            <a href="" class="item"
              ><img src="@/main/assets/images/banner02.jpg" alt=""
            /></a>
          </div>
        </div>
      </div>
    </div>

    <div class="section-02 product">
      <div class="container">
        <div class="head">
          <h2>{{ $t("the_most_wanted") }}</h2>
        </div>
        <carousel
          :nav="false"
          :responsive="{
            0: { items: 1, nav: false },
            600: { items: 3, nav: false },
          }"
          :margin="5"
          :items="3"
          :dots="false"
          dir="ltr"
          :autoplay="true"
        >
          <div class="item" v-for="item in recent_items" :key="item.id">
            <product :item="item" />
          </div>
        </carousel>
      </div>
    </div>

    <div class="section-05">
      <div class="container">
        <div class="head">
          <h2>تابعونا على حسابتنا على السوشيال ميديا</h2>
          <ul>
            <li>
              <a
                :href="settings.find((v) => v.key == 'instgram').value"
                target="__blank"
                ><img src="@/main/assets/images/002-instagram.svg" alt=""
              /></a>
            </li>
            <li>
              <a
                :href="settings.find((v) => v.key == 'facebook').value"
                target="__blank"
                ><img src="@/main/assets/images/003-facebook.svg" alt=""
              /></a>
            </li>
          </ul>
        </div>

        <div class="instagram">
          <div class="row">
            <div class="col-md-4">
              <figure class="full">
                <!-- src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FAhmed.Rafie65%2Fposts%2F4564443757005434&show_text=true&width=500" -->
                <!-- src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FAlmostashar.ahmad%2Fposts%2F1506469573029133&show_text=true&width=500" -->
                <iframe
                  :src="settings.find((v) => v.key == 'facebook_post').value"
                  width="100%"
                  height="100%"
                  style="border: none; overflow: hidden"
                  scrolling="no"
                  frameborder="0"
                  allowfullscreen="true"
                  allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                ></iframe>
              </figure>
            </div>
            <div class="col-md-4">
              <figure>
                <!-- w.slice(0 ,w.length-1 ) -->
                <Tweet
                  :id="tweet.slice(0, tweet.length - 1)"
                  :options="{ theme: 'dark' }"
                />
              </figure>
            </div>
            <div class="col-md-4">
              <figure>
                <InstagramEmbed
                  url="https://www.instagram.com/p/CYrGw71sHrb/?utm_source=ig_embed&amp;utm_campaign=loading"
                  :max-width="500"
                />
              </figure>
              <!-- <div class="row">
                <div class="col-md-6">
                  <figure class="full">
                    <img src="@/main/assets/images/ins04.jpg" alt="" />
                  </figure>
                </div>
                <div class="col-md-6">
                  <figure class="f-40">
                    <img src="@/main/assets/images/ins05.jpg" alt="" />
                  </figure>
                  <figure class="f-80">
                    <img src="@/main/assets/images/ins06.jpg" alt="" />
                  </figure>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import InstagramEmbed from "vue-instagram-embed";
import { Tweet } from "vue-tweet-embed";
import { mapState } from "vuex";
import carousel from "vue-owl-carousel2";
export default {
  components: {
    carousel,
    Tweet,
    InstagramEmbed,
  },
  data() {
    return {
      most_sold: [],
      test: false,
    };
  },
  computed: {
    ...mapState({
      settings: (state) => state.setting.all || [],
      recent_items: (state) => state.item.all,
      categories: (state) => state.category.all,
    }),
    tweet() {
      return this.settings.find((v) => v.key == "twitter_tweet").value;
    },
  },
  mounted() {
    setTimeout(() => {
      this.test = true;
    }, 2800);
    this.$store.dispatch("category/index");
    this.$store.dispatch("item/index");
  },
};
</script>
<style scoped>
.item {
  direction: rtl;
}
</style>