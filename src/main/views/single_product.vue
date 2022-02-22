<template>
  <div class="entry-content single-product">
    <div class="container">
      <!-- <nav aria-label="breadcrumb">
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
      </nav> -->
      <div class="row">
        <div class="col-md-9 right">
          <div class="caption-product">
            <div class="row">
              <!-- <div class="col-md-5">
                <img
                  style="max-height: 100%; max-width: 100%"
                  :src="one.image"
                  alt=""
                />
              </div> -->

              <div class="col-md-5">
                <viewer :options="options" :images="images"> </viewer>
                <carousel
                  :nav="false"
                  :dots="false"
                  id="sync1"
                  :items="1"
                  dir="ltr"
                >
                  <div class="item">
                    <figure>
                      <img
                        @click="show"
                        :src="selected_img ? selected_img : one.image"
                        alt=""
                      />
                    </figure>
                  </div>
                </carousel>
                <br />
                <carousel
                  :items="5"
                  :nav="false"
                  :dots="false"
                  id="sync2"
                  dir="ltr"
                >
                  <div
                    :key="index"
                    v-for="(image, index) in one.media"
                    class="item"
                  >
                    <figure>
                      <img @click="selected_img = image.url" :src="image.url" />
                    </figure>
                  </div>
                  <div class="item">
                    <figure>
                      <img
                        v-if="selected_img"
                        @click="selected_img = one.image"
                        :src="one.image"
                      />
                    </figure>
                  </div>
                </carousel>
              </div>
              <div class="col-md-7">
                <div class="desc">
                  <h2>
                    {{ one.name }}
                    <!-- .filter((v) => v.locale == locale)
                        .find((v) => v.field == "name").value -->
                  </h2>
                  <p v-html="one.brief"></p>
                  <div class="price">
                    <strong>
                      {{
                        one.offer
                          ? calcItemAfterDiscount(one)
                          : calcItemPrice(one)
                      }}</strong
                    >
                    <span>$ </span>
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
                        <span>{{ calcItemPrice(one) }} </span>
                      </div>
                    </div>
                  </div>

                  <div class="quantity d-flex align-items-center">
                    <span>{{ $t("quantity") }}</span>
                    <div id="quantity" class="d-flex align-items-center">
                      <button
                        class="btn-subtract"
                        type="button"
                        @click="decrement(one)"
                      >
                        -
                      </button>
                      <input
                        type="number"
                        class="item-quantity"
                        min="0"
                        :value="this.item_quantity"
                      />
                      <button
                        class="btn-add"
                        type="button"
                        @click="increment(one)"
                      >
                        +
                      </button>
                    </div>
                  </div>
                  <div class="row">
                    <div v-if="sizes[0]" class="col-md-7">
                      <div class="row">
                        <div style="position: relative" class="col-md-6">
                          <button
                            @click="selected_size = null"
                            style="position: absolute; left: 0; top: 48px"
                          >
                            x
                          </button>
                          <div class="mb-3">
                            <label for="" class="form-label">{{
                              $t("size")
                            }}</label>
                            <select v-model="selected_size" class="form-select">
                              <option value="" disabled selected>
                                {{ $t("select") }}
                              </option>
                              <option
                                v-for="(name, index) in sizes"
                                :key="index"
                                :value="name"
                              >
                                {{ name }}
                              </option>
                            </select>
                          </div>
                        </div>

                        <div style="position: relative" class="col-md-6">
                          <button
                            @click="selected_color = null"
                            style="position: absolute; left: 0; top: 48px"
                          >
                            x
                          </button>
                          <div class="mb-3">
                            <label for="" class="form-label">{{
                              $t("color")
                            }}</label>
                            <select
                              v-model="selected_color"
                              class="form-select"
                            >
                              <option disabled selected>
                                {{ $t("select") }}
                              </option>
                              <option
                                v-for="(name, index) in colors"
                                :key="index"
                                :value="name"
                              >
                                {{ name }}
                              </option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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

              <!-- <div class="col-md-12">
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
              </div> -->
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
              <p>
                {{ $t("Free_delivery_if") }}
                {{
                  settings.find((v) => v.key == "limit_price_for_shipment")
                    .value || 0
                }}
                $
              </p>
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
                <div
                  :key="index"
                  v-for="(same_item, index) in same_items"
                  class="item"
                >
                  <div class="d-flex">
                    <a href="">
                      <figure>
                        <img :src="same_item.image" alt="" />
                      </figure>
                    </a>
                    <div class="caption">
                      <a href=""> {{ same_item.name }} </a>
                      <div class="d-flex justify-content-between">
                        <div class="price">
                          <strong>{{ calcItemPrice(same_item) }}</strong> $
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
              </li> -->
              <!-- <li class="nav-item" role="presentation">
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
              <div
                class="tab-pane fade"
                id="profile"
                role="tabpanel"
                aria-labelledby="profile-tab"
              >
                <div class="content">
                  <!-- <div style="border: grey solid 1px" class="row">
                    <div class="col-md-3">
                      owhsad
                    </div>
                    <div class="col-md-3">
                      owhsad
                    </div>
                    <div class="col-md-3">
                      owhsad
                    </div>
                    <div class="col-md-3">
                      owhsad
                    </div>
                  </div> -->
                </div>
              </div>
              <!-- <div
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
import "viewerjs/dist/viewer.css";
import VueViewer from "v-viewer";
import Vue from "vue";
Vue.use(VueViewer);
import { mapState } from "vuex";
export default {
  components: {
    carousel,
  },
  data() {
    return {
      one: {},
      colors: [],
      sizes: [],
      properties: [],
      selected_color: null,
      selected_price: null,
      selected_size: null,
      selected_img: null,
      item_quantity: 1,
      windowWidth: window.innerHeight,
      success: false,
      images: [],
      options: {
        inline: true,
        button: false,
        navbar: true,
        title: false,
        toolbar: false,
        tooltip: false,
        movable: false,
        zoomable: true,
        rotatable: false,
        scalable: false,
        transition: true,
        fullscreen: false,
        keyboard: true,
      },
    };
  },
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
    if (this.$route.params.id) {
      this.$store.dispatch("item/show", { id: this.$route.params.id });
      this.$store.dispatch("property/index", {
        item_id: this.$route.params.id,
      });
    } else {
      this.$router.push("/category");
    }
  },
  computed: {
    ...mapState({
      one_item: (state) => state.item.one,
      locale: (state) => state.locales.locale,
      same_items: (state) => state.item.all || [],
      order: (state) => state.cart.order,
      all_properties: (state) => state.property.all,
      settings: (state) => state.setting.all || [],
    }),
  },
  methods: {
    show() {
      this.$viewerApi({
        images: this.selected_img
          ? Array.from(new Set([this.selected_img].concat(this.images)))
          : Array.from(new Set([this.one.image].concat(this.images))),
        options: this.options,
      });
    },
    coloersNames(properties) {
      let arr = properties.map((a) => a.color.name);
      return [...new Set(arr)];
    },
    sizesNames(properties) {
      let arr = properties.map((a) => a.size.name);
      return [...new Set(arr)];
    },
    calcItemAfterDiscount(item) {
      let discount = (this.one.offer.percentage / 100) * item.selling_price;
      let item_dicounted = item.selling_price - discount;
      // let tax = item.tax ? item.tax.percentage : 0;
      return parseFloat(item_dicounted).toFixed(2);
      // return parseFloat(item_dicounted * (tax / 100 + 1)).toFixed(2);
    },
    calcItemPrice(item) {
      // let tax = item.tax ? item.tax.percentage : 0;
      return parseFloat(item.selling_price).toFixed(2);
      // return parseFloat(item.selling_price * (tax / 100 + 1)).toFixed(2);
    },
    addToCart(item) {
      item.item_quantity =
        item.item_quantity > 0
          ? item.item_quantity + this.item_quantity
          : this.item_quantity;
      if (this.selected_size && this.selected_color) {
        let test = this.properties.find(
          (v) =>
            v.size.name == this.selected_size &&
            v.color.name == this.selected_color
        );
        item.selling_price = test.price;
        item.property_id = test.id;
      } else {
        item.property_id ? (item.property_id = null) : "";
      }
      this.$store.dispatch("cart/addItem", item);
      // this.$store.dispatch("cart/addItem", item);
    },
    like(item) {
      this.$store.dispatch("item_reaction/store", {
        item_id: item.id,
        user_id: this.$root.user.id,
      });
    },
    rank(one, rank) {
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
      this.item_quantity++;
      // item.item_quantity = this.item_quantity;
      // this.$store.dispatch("cart/incrementItem", item);
    },
    decrement(item) {
      this.item_quantity == 1 ? "" : this.item_quantity--;
      // item.item_quantity = this.item_quantity;
      // this.$store.dispatch("cart/decrementItem", item);
    },
  },
  watch: {
    one(val) {
      this.one = val;
      this.images = val.media.map((v) => v.url);
      this.images.push(val.image);
    },
    one_item(val) {
      if (val) {
        this.one = val;
        // if (this.order.items.find((v) => v.item_id == val.id)) {
        //   let one = this.order.items.find((v) => v.item_id == val.id);
        //   this.one = { ...val, ...one };
        // } else {
        //   this.one = val;
        // }
        // this.$store.dispatch("item/index", { category_id: val.category_id });
      }
    },
    selected_price(val) {
      if (val) {
        this.one.selling_price = val;
      } else {
        this.one.selling_price = this.one_item.selling_price;
      }
    },
    all_properties(val) {
      this.properties = JSON.parse(JSON.stringify(val));
    },
    properties: {
      handler(val) {
        this.colors = this.coloersNames(val);
        this.sizes = this.sizesNames(val);
      },
      deep: true,
    },
    selected_color(val) {
      if (val) {
        this.properties = this.all_properties.filter(
          (property) => property.color.name == val
        );
      } else {
        this.properties = this.all_properties;
      }
    },
    selected_size(val) {
      if (val) {
        this.properties = this.all_properties.filter(
          (property) => property.size.name == val
        );
      } else {
        this.properties = this.all_properties;
      }
    },
  },
  updated() {
    if (this.selected_size && this.selected_color) {
      this.selected_price = this.properties.find(
        (v) =>
          v.size.name == this.selected_size &&
          v.color.name == this.selected_color
      ).price;
    } else {
      this.selected_price = null;
    }
  },
};
</script>
<style  >
.mouse-cover-canvas {
  left: 404px !important ;
  width: 400px !important ;
  height: 350px !important ;
}
</style>