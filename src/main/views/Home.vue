
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
              <h3>{{$t('Stand_out_with_your_style')}}</h3>
              <h2>{{$t('with_corner')}}</h2>
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
              <h3>{{$t('support_and_help')}}</h3>
              <p>{{$t('Customer_service')}}</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item text-center">
              <figure>
                <img src="@/main/assets/images/shipped.svg" alt="" />
              </figure>
              <h3>{{$t('free delivery')}}</h3>
              <p>{{$t('Free_delivery_if')}}</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="item text-center">
              <figure>
                <img src="@/main/assets/images/discount.svg" alt="" />
              </figure>
              <h3>{{$t('permanent_offers')}}</h3>
              <p>{{$t('discount_offer')}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-02 product">
      <div class="container">
        <div class="head">
          <h2>{{$t('latest_product')}}</h2>
        </div>
        <carousel dir="ltr" :autoplay="true" :nav="false">
          <div class="item" v-for="item in recent_items" :key="item.id">
            <product :item="item" />
          </div>
        </carousel>
      </div>
    </div>

    <div class="section-03 categuory">
      <div class="container">
        <div class="head">
          <h2>{{$$t('category')}}</h2>
          <p>{{$t('Shop_with_ease_by_categories')}}</p>
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
          <h2>{{$t('the_most_wanted')}}</h2>
        </div>
        <carousel dir="ltr" class="carousel" :autoplay="true" :nav="false">
          <div class="item">
            <figure>
              <a href=""
                ><img
                  src="@/main/assets/images/5cbd19671e766acf3c6a76cf14cb4415.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="caption">
              <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
              <div class="d-flex align-items-center justify-content-between">
                <p class="price">300 ريال</p>
                <p class="star">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                </p>
              </div>
              <div
                class="d-flex mt-2 justify-content-between align-items-center"
              >
                <a href="" class="addToCart button"
                  ><img src="@/main/assets/images/shopping-cart-2.svg" alt="" />
                  اضف إلى السلة</a
                >
                <a href="" class="addToFavorite button"
                  ><img src="@/main/assets/images/hearts.svg" alt=""
                /></a>
              </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <a href=""
                ><img
                  src="@/main/assets/images/969737a0d391924f27ef42ddce770fe7.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="caption">
              <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
              <div class="d-flex align-items-center justify-content-between">
                <p class="price"><span>300</span> ريال</p>
                <p class="star">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                </p>
              </div>
              <div
                class="d-flex mt-2 justify-content-between align-items-center"
              >
                <a href="" class="addToCart button"
                  ><img src="@/main/assets/images/shopping-cart-2.svg" alt="" />
                  اضف إلى السلة</a
                >
                <a href="" class="addToFavorite button"
                  ><img src="@/main/assets/images/hearts.svg" alt=""
                /></a>
              </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <a href=""
                ><img
                  src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="caption">
              <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
              <div class="d-flex align-items-center justify-content-between">
                <p class="price"><span>300</span> ريال</p>
                <p class="star">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                </p>
              </div>
              <div
                class="d-flex mt-2 justify-content-between align-items-center"
              >
                <a href="" class="addToCart button"
                  ><img src="@/main/assets/images/shopping-cart-2.svg" alt="" />
                  اضف إلى السلة</a
                >
                <a href="" class="addToFavorite button"
                  ><img src="@/main/assets/images/hearts.svg" alt=""
                /></a>
              </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <a href=""
                ><img
                  src="@/main/assets/images/e2b4fd5b11b08afbef622253193402b7.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="caption">
              <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
              <div class="d-flex align-items-center justify-content-between">
                <p class="price"><span>300</span> ريال</p>
                <p class="star">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                </p>
              </div>
              <div
                class="d-flex mt-2 justify-content-between align-items-center"
              >
                <a href="" class="addToCart button"
                  ><img src="@/main/assets/images/shopping-cart-2.svg" alt="" />
                  اضف إلى السلة</a
                >
                <a href="" class="addToFavorite button"
                  ><img src="@/main/assets/images/hearts.svg" alt=""
                /></a>
              </div>
            </div>
          </div>
          <div class="item">
            <figure>
              <a href=""
                ><img
                  src="@/main/assets/images/e2b4fd5b11b08afbef622253193402b7.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="caption">
              <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
              <div class="d-flex align-items-center justify-content-between">
                <p class="price"><span>300</span> ريال</p>
                <p class="star">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star"></i>
                </p>
              </div>
              <div
                class="d-flex mt-2 justify-content-between align-items-center"
              >
                <a href="" class="addToCart button"
                  ><img src="@/main/assets/images/shopping-cart-2.svg" alt="" />
                  اضف إلى السلة</a
                >
                <a href="" class="addToFavorite button"
                  ><img src="@/main/assets/images/hearts.svg" alt=""
                /></a>
              </div>
            </div>
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
              <a href=""
                ><img src="@/main/assets/images/002-instagram.svg" alt=""
              /></a>
            </li>
            <li>
              <a href=""
                ><img src="@/main/assets/images/003-facebook.svg" alt=""
              /></a>
            </li>
          </ul>
        </div>

        <div class="instagram">
          <div class="row">
            <div class="col-md-4">
              <figure class="full">
                <img src="@/main/assets/images/ins01.jpg" alt="" />
              </figure>
            </div>
            <div class="col-md-4">
              <figure class="f-80">
                <img src="@/main/assets/images/ins02.jpg" alt="" />
              </figure>
              <figure class="f-40">
                <img src="@/main/assets/images/ins03.jpg" alt="" />
              </figure>
            </div>
            <div class="col-md-4">
              <div class="row">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import carousel from "vue-owl-carousel2";
export default {
  components: {
    carousel,
  },
  data() {
    return {
      recent_items: [],
      most_sold: [],
      categories:[]
    };
  },
  mounted() {
    this.$store.dispatch("item/index").then((data) => {
      this.recent_items = data;
    });
    this.$store.dispatch("category/index").then((data) => {
      this.categories = data;
    });
  },
};
</script>
<style scoped>
.item {
  direction: rtl;
}
</style>