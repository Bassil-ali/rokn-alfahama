<template>
  <div class="entry-content cart">
    <div class="head">
      <h2>{{ $t("Shopping_cart") }}</h2>
    </div>
    <div class="entry-content cart-empty" v-if="items.length == 0">
      <div class="entry-content">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="text-center">
                <figure>
                  <img
                    src="@/main/assets/images/undraw_empty_cart_co35.svg"
                    alt=""
                  />
                </figure>
                <h3>{{ $t("cart_empty") }}</h3>
                <p>
                  {{ $t("go_to_option") }}
                </p>
                <a href="/main/category" class="button">
                  {{ $t("Continue_shopping") }}</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="entry-content" v-else>
      <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="image">{{ $t("Photo") }}</th>
              <th scope="col">{{ $t("Product") }}</th>
              <th scope="col">{{ $t("Quantity") }}</th>
              <th scope="col">{{ $t("Total") }}</th>
              <th scope="col">{{ $t("delete") }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in items" :key="item.id">
              <td data-title="">
                <figure><img :src="item.image" alt="" /></figure>
              </td>
              <td>
                {{ item.item_name }}
              </td>
              <td data-title="الكمية">
                <div class="quantity d-flex align-items-center">
                  <div id="quantity" class="d-flex align-items-center">
                    <button
                      class="btn-subtract"
                      type="button"
                      @click="decrement(item)"
                    >
                      -
                    </button>
                    <input
                      type="number"
                      class="item-quantity"
                      min="0"
                      :value="item.item_quantity"
                    />
                    <button
                      class="btn-add"
                      type="button"
                      @click="increment(item)"
                    >
                      +
                    </button>
                  </div>
                </div>
              </td>
              <td>
                {{ item.item_price * item.item_quantity - item.discount }}
              </td>
              <td data-title="حذف">
                <a @click.prevent="remove(item)" class="button"
                  ><img src="@/main/assets/images/delete-red.svg" alt=""
                /></a>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6">
                <div class="d-flex justify-content-end">
                  <div class="d-flex">
                    <div class="totel me-3">
                      {{ $t("total_summation") }}:
                      <strong>
                        {{
                          items.reduce((c, n) => c + calcPriceAfterDis(n), 0)
                        }}
                        ر.س</strong
                      >
                    </div>
                    <div class="button0">
                      <router-link to="checkout">{{
                        $t("Complete_the_order")
                      }}</router-link>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  data() {
    return {};
  },
  computed: {
    ...mapState({
      items: (state) => state.cart.order.items,
    }),
  },
  watch: {
    items(val) {
      if (!val[0]) {
        this.$store.dispatch("cart/addOrderTotalPrice", 0);
      }
    },
  },
  methods: {
    increment(item) {
      this.$store.dispatch("cart/incrementItem", item);
    },
    decrement(item) {
      this.$store.dispatch("cart/decrementItem", item);
    },
    remove(item) {
      this.$store.dispatch("cart/removeItem", item);
    },
    calcPriceAfterDis(item) {
      return item.item_price * item.item_quantity - item.discount;
    },
  },
};
</script>

