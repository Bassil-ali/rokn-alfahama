<template>
  <div class="entry-content offer">
    <div class="container">
      <div class="head">
        <h2>{{ $t("Latest_Offers") }}</h2>
      </div>

      <div v-if="offer.image" class="head-offer">
        <img :src="offer.image.url" alt="" />
      </div>
      <div v-else class="head-offer">
        <img src="@/main/assets/images/0001.jpg" alt="" />
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
                    <i
                      style="cursor: pointer"
                      v-for="i in 5"
                      :key="i"
                      @click="rank(item, i)"
                      :class="`bi bi-star${item.rank <= i ? '-fill' : ''}`"
                    ></i>
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
                    <span>{{ (item.selling_price).toFixed(2) }} </span>
                  </div>
                  <div class="discount">
                    <strong>{{ $t("Discount") }}</strong>
                    <span>{{ offer.percentage }}%</span>
                  </div>
                </div>
                <div
                  class="d-flex mt-2 justify-content-between align-items-center"
                >
                  <a
                    style="cursor: pointer"
                    @click="addToCart(item)"
                    class="addToCart button"
                    ><img
                      src="@/main/assets/images/shopping-cart-2.svg"
                      alt=""
                    />
                    {{ $t("add_to_cart") }}
                  </a>
                  <a
                    href="#"
                    @click.prevent="
                      like(item);
                      item.liked = !item.liked;
                    "
                    class="addToFavorite button"
                  >
                    <img
                      v-if="item.liked"
                      src="@/main/assets/images/hearts-fill.svg"
                      alt=""
                    />
                    <img v-else src="@/main/assets/images/hearts.svg" alt="" />
                  </a>
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
      liking: false,
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
      console.log("start item offers ");
      this.$store.dispatch("offer_item/index", { offer_id: val[0].id });
      console.log("end item offers ");
    
    },
  },
  methods: {
    calcNewPrice(price) {
      let discount = (this.offer.percentage / 100) * price;
      return price - discount;
    },
    addToCart(item) {
      if (this.$root.user_obj) {
        this.$store.dispatch("cart/addItem", item);
      } else {
        this.$router.push("/login");
      }
    },
    like(item) {
      this.$store.dispatch("item_reaction/store", {
        item_id: item.id,
        user_id: this.$root.user.id,
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
