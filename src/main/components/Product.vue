<template>
  <div class="item mb-3">
    <figure>
      <a href=""><img :src="item.image" alt="" /></a>
    </figure>
    <div class="caption">
      <a href="" class="title">{{ item.name }}</a>
      <div class="d-flex align-items-center justify-content-between">
        <p class="price">{{ item.selling_price }} ريال</p>
        <p class="star">
          <i
            style="cursor:pointer"
            v-for="i in 5"
            :key="i"
            @click="rank(item, i)"
            :class="`bi bi-star${item.rank <= i ? '-fill' : ''}`"
          ></i> 
        </p>
      </div>
      <div class="d-flex mt-2 justify-content-between align-items-center">
        <a href="" @click.prevent="addToCart(item)" class="addToCart button"
          ><img src="@/main/assets/images/shopping-cart-2.svg" alt="" />
          {{ $t("add_to_cart") }}</a
        >
        <a
          href="#"
          @click.prevent="like(item)"
          class="addToFavorite button"
          :style="item.liked ? `background:var(--c2);color:#fff;` : ''"
          ><img src="@/main/assets/images/hearts.svg" alt=""
        /></a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["item"],
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
  },
};
</script>