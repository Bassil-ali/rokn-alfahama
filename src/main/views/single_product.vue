<template>
  <div class="entry-content single-product">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#"><i class="bi bi-house-door"></i></a>
          </li>
          <li class="breadcrumb-item"><a href="#">التصنيفات</a></li>
          <li class="breadcrumb-item"><a href="#">عطور شرقية</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            عطر مسك سلك
          </li>
        </ol>
      </nav>
      <div class="row">
        <div class="col-md-9 right">
          <div class="caption-product">
            <div class="row">
              <div class="col-md-5">
                <img
                  style="max-height: 100%; max-width: 100%"
                  :src="one.image"
                  alt=""
                />
              </div>
              <div class="col-md-7">
                <div class="desc">
                  <h2>
                    {{
                      one.translations
                        .filter((v) => v.locale == locale)
                        .find((v) => v.field == "name").value
                    }}
                  </h2>
                  <p>
                    {{
                      one.translations
                        .filter((v) => v.locale == locale)
                        .find((v) => v.field == "brief").value
                    }}
                  </p>
                  <div class="price">
                    <strong>{{
                      one.offer
                        ? one.selling_price -
                          (one.offer.percentage / 100) * one.selling_price
                        : one.selling_price
                    }}</strong>
                    <span>$ سعودي</span>
                    <div
                      v-if="one.offer"
                      class="
                        d-flex
                        align-items-center
                        justify-content-between
                        discount-offer
                      "
                    >
                      <div
                        style="
                          color: #9f9f9f;
                          text-decoration: line-through;
                          font-weight: 500;
                        "
                      >
                        <span>{{ one.selling_price }} </span>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="quantity d-flex align-items-center">
                    <span>{{ $t("quantity") }}</span>
                    <div id="quantity" class="d-flex align-items-center">
                      <button
                        class="btn-subtract"
                        @click="decrement(one)"
                        type="button"
                      >
                        -
                      </button>
                      <input
                        type="number"
                        class="item-quantity"
                        min="0"
                        value="1"
                      />
                      <button
                        class="btn-add"
                        @click="increment(one)"
                        type="button"
                      >
                        +
                      </button>
                    </div>
                  </div> -->
                  <div
                    class="
                      buttons
                      d-flex
                      justify-content-between
                      align-items-center
                    "
                  >
                    <a @click.prevent="addToCart(one)" class="addToCart button"
                      ><img
                        src="@/main/assets/images/shopping-cart-2.svg"
                        alt=""
                      />
                      {{ $t("add_to_cart") }}</a
                    >
                    <a @click="like(one)" class="addToFavorite button"
                      ><img src="@/main/assets/images/hearts.svg" alt=""
                    /></a>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <carousel
                  :nav="false"
                  :autoplaySpeed="true"
                  :autoplay="true"
                  :autoplayTimeout="1000"
                  :dots="false"
                  :margin="5"
                  :items="2"
                >
                  <img
                    :key="index"
                    v-for="(image, index) in one.media"
                    style="height: 200px"
                    :src="image.url"
                  />
                </carousel>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 left">
          <div class="section-01">
            <div class="item mb-5 text-center">
              <figure>
                <img src="@/main/assets/images/discount.svg" alt="" />
              </figure>
              <h3>{{ $t("permanent_offers") }}</h3>
              <p>{{ $t("discount_offer") }}</p>
            </div>
            <div class="item mb-5 text-center">
              <figure>
                <img src="@/main/assets/images/shipped.svg" alt="" />
              </figure>
              <h3>{{ $t("free_delivery") }}</h3>
              <p>{{ $t("Free_delivery_if") }}</p>
            </div>
            <div class="item mb-3 text-center">
              <figure>
                <img src="@/main/assets/images/headphones.svg" alt="" />
              </figure>
              <h3>{{ $t("help") }}</h3>
              <p>{{ $t("Customer_service") }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="sidebar">
            <div class="box">
              <h2>{{ $t("Similar_Products") }}</h2>
              <div class="product-list">
                <div class="item">
                  <div
                    :key="index"
                    v-for="(same_item, index) in same_items"
                    class="d-flex"
                  >
                    <a href="">
                      <figure>
                        <img :src="same_item.image" alt="" />
                      </figure>
                    </a>
                    <div class="caption">
                      <a href=""> {{ same_item.name }} </a>
                      <div class="d-flex justify-content-between">
                        <div class="price">
                          <strong>{{ same_item.selling_price }}</strong> $
                        </div>
                        <a
                          @click="addToCart(same_item)"
                          class="button addToCart"
                          ><img
                            src="@/main/assets/images/shopping-cart-2.svg"
                            alt=""
                          />
                          {{ $t("add_to_cart") }}</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="home-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#home"
                  type="button"
                  role="tab"
                  aria-controls="home"
                  aria-selected="true"
                >
                  {{ $t("Product_Description") }}
                </button>
              </li>
              <!-- <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="profile-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#profile"
                  type="button"
                  role="tab"
                  aria-controls="profile"
                  aria-selected="false"
                >
                  {{ $t("Properties") }}
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="contact-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#contact"
                  type="button"
                  role="tab"
                  aria-controls="contact"
                  aria-selected="false"
                >
                  {{ $t("Reviews") }}
                </button>
              </li> -->
            </ul>
            <div class="tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="home"
                role="tabpanel"
                aria-labelledby="home-tab"
              >
                <div class="content">
                  <div
                    v-html="
                      one.translations
                        .filter((v) => v.locale == locale)
                        .find((v) => v.field == 'description').value
                    "
                  ></div>
                </div>
              </div>
              <!-- <div
                class="tab-pane fade"
                id="profile"
                role="tabpanel"
                aria-labelledby="profile-tab"
              >
                <div class="content">
                  <p>خصائص</p>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="contact"
                role="tabpanel"
                aria-labelledby="contact-tab"
              >
                <div class="content">
                  <p>تقييمات</p>
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
import carousel from "vue-owl-carousel2";
import { mapState } from "vuex";
export default {
  components: {
    carousel,
  },
  data() {
    return {};
  },
  mounted() {
    if (this.$route.params.id) {
      this.$store.dispatch("item/show", { id: this.$route.params.id });
    } else {
      this.$router.push("/category");
    }
  },
  computed: {
    ...mapState({
      one: (state) => state.item.one,
      locale: (state) => state.locales.locale,
      same_items: (state) => state.item.all || [],
    }),
  },
  methods: {
    addToCart(item) {
      this.$store.dispatch("cart/addItem", item);
    },
    like(item) {
      this.$store.dispatch("item_reaction/store", {
        item_id: item.id,
      });
    },
    rank(item, rank) {
      this.$store
        .dispatch("item_rank/store", {
          item_id: item.id,
          rank,
        })
        .then((data) => {
          item.rank = data.item.rank;
        });
    },
    increment(item) {
      this.$store.dispatch("cart/incrementItem", item);
    },
    decrement(item) {
      this.$store.dispatch("cart/decrementItem", item);
    },
  },
  watch: {
    one(val) {
      if (val) {
        this.$store.dispatch("item/index", { category_id: val.category_id });
      }
    },
  },
};
</script>
<style scoped>
</style>