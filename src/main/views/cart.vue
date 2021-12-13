<template>
  <div class="entry-content cart">
    <div class="head">
      <h2>سلة التسوق</h2>
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
                <h3>سلة التسوق فارغة</h3>
                <p>
                  يمكنك الانتقال الى خيار متابعة التسوق واضافة منتجاتك المفضلة
                </p>
                <a href="" class="button">متابعة التسوق</a>
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
              <th scope="col" class="image">الصورة</th>
              <th scope="col">المنتج</th>
              <th scope="col">الكمية</th>
              <th scope="col">المجموع</th>
              <th scope="col">حذف</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in items" :key="item.id">
              <td data-title="">
                <figure><img :src="item.image" alt="" /></figure>
              </td>
              <td>
                {{ item.name }}
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
                {{ item.item_price * item.item_quantity }}
              </td>
              <td data-title="حذف">
                <a href="#" @click.prevent="remove(item)" class="button"
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
                      المجموع الكلي:
                      <strong>
                        {{
                          items.reduce(
                            (c, n) => c + n.item_price * n.item_quantity,
                            0
                          )
                        }}
                        ر.س</strong
                      >
                    </div>
                    <div class="button0"><router-link to="checkout">اتمام الطلب</router-link></div>
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
  computed: {
    ...mapState({
      items: (state) => state.cart.items,
    }),
  },
  methods: {
    remove(item) {
      this.$store.dispatch("cart/removeItem", item);
    },

    increment(item) {
      this.$store.dispatch("cart/incrementItem", item);
    },
    decrement(item) {
      this.$store.dispatch("cart/decrementItem", item);
    },
  },
};
</script>

