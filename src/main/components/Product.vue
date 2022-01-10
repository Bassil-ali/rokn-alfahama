<template>
  <div class="product">
    <div class="row">
      <div class="item mb-3">
        <figure style="position: relative">
          <a :href="`/main/single-product/${item.id}`"
            ><img :src="item.image" alt=""
          /></a>
          <div
            style="position: absolute; top: 121px; left: 0"
            v-if="offer"
            class="
              d-flex
              align-items-center
              justify-content-between
              discount-offer
            "
          >
            <div class="discount">
              <strong>{{ $t("Discount") }}</strong>
              <span>{{ offer.percentage }}%</span>
            </div>
          </div>
        </figure>
        <div class="caption">
          <a :href="`/main/single-product/${item.id}`" class="title">
            <span
              v-if="offer"
              style="
                float: left;
                color: #9f9f9f;
                text-decoration: line-through;
                font-weight: 500;
              "
            >
              <span>{{ item.selling_price }} </span> </span
            >{{ item.name }}
          </a>
          <div class="d-flex align-items-center justify-content-between">
            <p class="price">
              {{
                offer ? calcNewPrice(item.selling_price) : item.selling_price
              }}
              ريال
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

          <div class="d-flex mt-2 justify-content-between align-items-center">
            <a @click="addToCart(item)" class="addToCart button"
              ><img src="@/main/assets/images/shopping-cart-2.svg" alt="" /> اضف
              إلى السلة</a
            >
            <a
              href="#"
              @click.prevent="
                like(item);
                liking = !liking;
              "
              class="addToFavorite button"
            >
              <img
                v-if="liking"
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
</template>
<script>
export default {
  props: ["item"],
  data() {
    return { liking: false };
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
  computed: {
    offer() {
      return this.item.offer;
    },
  },
  watch: {
    item: {
      handler(val) {
        if (val) {
          this.liking = val.like ? true : false;
        }
      },
      deep: true,
    },
  },
};
</script>