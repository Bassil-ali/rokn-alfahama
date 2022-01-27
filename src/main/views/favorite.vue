<template>
  <div class="entry-content offer">
    <div class="container">
      <div class="head">
        <h2>{{ $t("Favorite") }}</h2>
      </div>

      <div class="product">
        <div class="row">
          <div class="col-md-3" v-for="item in items" :key="item.id">
            <div class="item mb-3">
              <figure>
                <a href=""><img :src="item.image" alt="" /></a>
              </figure>
              <div class="caption">
                <a href="" class="title">{{ item.name }}</a>
                <div class="d-flex align-items-center justify-content-between">
                  <p class="price">{{ item.selling_price }} $</p>
                  <p class="star">
                    <i
                      v-for="i in 5"
                      :key="i"
                      @click="rank(item, i)"
                      :class="`bi bi-star${item.rank <= i ? '-fill' : ''}`"
                    ></i>
                  </p>
                </div>
                <div
                  class="d-flex mt-2 justify-content-between align-items-center"
                >
                  <a
                    href=""
                    class="addToCart button"
                    @click.prevent="addToCart(item)"
                    ><img
                      src="@/main/assets/images/shopping-cart-2.svg"
                      alt=""
                    />
                    {{ $t("add_to_cart") }}</a
                  >
                  <a
                    href=""
                    class="addToFavorite button"
                    @click.prevent="like(item)"
                    ><img src="@/main/assets/images/hearts-fill.svg" alt=""
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
  mounted() {
    this.$store.dispatch("item/index", {
      liked: true,
    });
  },
  computed: {
    ...mapState({
      items: (state) => state.item.all,
    }),
  },
  methods: {
    addToCart(item) {
      this.$store.dispatch("cart/addItem", item);
    },
    like(item) {
      this.$store
        .dispatch("item_reaction/store", {
          item_id: item.id,
          user_id: this.$root.user.id,
        })
        .then(() => {
          this.$store.dispatch("item/index", {
            liked: true,
          });
        });
    },
    rank(item, rank) {
      this.$store
        .dispatch("item_rank/store", {
          item_id: item.id,
          user_id: this.$root.user.id,
          rank,
        })
        .then((data) => {
          item.rank = data.item.rank;
        });
    },
  },
};
</script>
