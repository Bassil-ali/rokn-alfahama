<template>
  <div class="entry-content offer">
    <div class="container">
      <div class="head">
        <h2>{{ $t("Latest_Offers") }}</h2>
      </div>

      <div class="head-offer">
        <img v-if="offer" :src="offer.image.url" alt="" />
        <img v-else src="@/main/assets/images/0001.jpg" alt="" />
        <!-- @/main/assets/images/0001.jpg -->
      </div>

      <div v-if="items" class="product">
        <div class="row">
          <div :key="index" v-for="(item, index) in items" class="col-md-3">
            <div class="item mb-3">
              <figure>
                <a :href="`/main/single-product/${item.id}`"
                  ><img :src="item.image" alt=""
                /></a>
              </figure>
              <div class="caption">
                <a :href="`/main/single-product/${item.id}`" class="title">
                  {{ item.name }}
                </a>
                <div class="d-flex align-items-center justify-content-between">
                  <p class="price">
                    {{ calcNewPrice(item.selling_price) }}
                    $
                  </p>
                  <p class="star">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </p>
                </div>
                <div
                  class="
                    d-flex
                    align-items-center
                    justify-content-between
                    discount-offer
                  "
                >
                  <div class="price-old">
                    <span>{{ item.selling_price }} </span>
                  </div>
                  <div class="discount">
                    <strong>{{ $t("Discount") }}</strong>
                    <span>{{ offer.percentage }}%</span>
                  </div>
                </div>
                <div
                  class="d-flex mt-2 justify-content-between align-items-center"
                >
                  <a @click="$root.addToCartTest(item)" class="addToCart button"
                    ><img
                      src="@/main/assets/images/shopping-cart-2.svg"
                      alt=""
                    />
                    اضف إلى السلة</a
                  >
                  <a href="" class="addToFavorite button"
                    ><img src="@/main/assets/images/hearts.svg" alt=""
                  /></a>
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
import { mapState } from "vuex";
export default {
  data() {
    return {
      offer: {},
    };
  },
  mounted() {
    this.$store.dispatch("offer/index");
  },
  computed: {
    ...mapState({
      offers: (state) => state.offer.all,
      items: (state) => state.offer_item.all,
    }),
  },
  watch: {
    offers(val) {
      this.offer = val[0];
      this.$store.dispatch("offer_item/index", { offer_id: val[0].id });
    },
  },
  methods: {
    calcNewPrice(price) {
      let discount = (this.offer.percentage / 100) * price;
      return price - discount;
    },
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
  },
};
</script>
