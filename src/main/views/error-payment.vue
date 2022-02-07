<template>
  <div class="container">
    <div class="entry-content checkout">
      <h2>{{$t('Checkout')}}</h2>

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="row m-0">
            <div class="col-md-6 p-0">
              <div class="block right">
                <div>
                  <div class="text-center">
                    <figure>
                      <img src="@/main/assets/images/false.svg" alt="" />
                    </figure>
                    <h5>{{$t('We_apologize')}}</h5>
                    <p>{{$t('not_complete')}}</p>
                    <p>{{$t('try')}}</p>
                  </div>
                  <h4>{{$t('Contact_info')}}</h4>
                  <ul>
                    <li>
                      <i class="far fa-user-circle"></i
                      >{{ $root.user ? order.user.name : order.customer_name }}
                    </li>
                    <li>
                      <i class="fas fa-mobile-alt"></i>
                      {{
                        $root.user ? order.user.mobile : order.customer_mobile
                      }}
                    </li>
                  </ul>
                  <h4>{{$t('Contact_info')}}</h4>
                  <ul>
                    <li>
                      <i class="fas fa-map-marker-alt"></i>

                      {{ address.area }} - {{ address.widget }} -
                      {{ address.street }} - {{ address.avenue }} -
                      {{ address.house_number }} - {{ address.floor_no }} -
                      {{ address.apartment_number }}
                    </li>
                    <li>
                      {{ address.notes }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 p-0">
              <div class="block left">
                <h4>{{$t('Contact_info')}}</h4>
                <div class="orders">
                  <div
                    :key="index"
                    v-for="(item, index) in items"
                    class="order-item"
                  >
                    <div class="d-flex">
                      <a href="" class="del"
                        ><img src="assets/images/del.svg" alt=""
                      /></a>
                      <figure>
                        <img :src="item.image" alt="" />
                      </figure>
                      <div class="caption">
                        <h2>{{ item.item_name || item.name }}</h2>
                        <div class="d-flex justify-content-between">
                          <div class="price">{{ item.item_price }} $</div>
                          <div class="quantity">
                            {{$t('count')}} : <strong>{{ item.item_quantity }}</strong>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="footer">
                  <ul>
                    <li>
                      {{$t('number_of_products')}}
                                            <span>{{
                        items
                          ? items.reduce(
                              (c, n) => c + parseInt(n.item_quantity),
                              0
                            )
                          : 0
                      }}</span>
                    </li>
                    <li>
                      {{ $t("total_summation") }}
                      <span>{{ totals.total }}$</span>
                    </li>
                    <li>
                      {{ $t("Discount") }} <span> {{ totals.discount }} $</span>
                    </li>
                    <li>
                      {{ $t("Delivery_price") }}
                      <span
                        v-if="totals.total > limit_shipment"
                        style="
                          float: left;
                          color: #9f9f9f;
                          text-decoration: line-through;
                          font-weight: 500;
                        "
                      >
                        {{ total_shipment }}
                        $
                      </span>

                      <span v-else> {{ total_shipment }} $</span>
                    </li>
                    <li>
                      {{ $t("tax total") }}

                      <span> + {{ parseFloat(total_taxes).toFixed(2) }} $</span>
                    </li>
                    <li class="toot">
                      {{ $t("total_summation") }}
                      <span v-if="totals.total_taxed > limit_shipment">
                        {{ totals.total_taxed.toFixed(2) }}
                        $</span
                      >
                      <span v-else>
                        {{ (totals.total_taxed + total_shipment).toFixed(2) }}
                        $</span
                      >
                    </li>
                  </ul>
                </div>
                <!-- <div class="footer">
                  <ul>
                    <li>رقم العملية <span>462758964660-8059078</span></li>
                    <li>رقم الطلب <span>462758964660-8059078</span></li>
                    <li>معرف الطلب <span>462758964660-8059078</span></li>
                  </ul>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-5 mb-5 text-center">
        <a :href="retry()" class="button fill me-3"> {{$t('')}}} </a>
        <a href="/" class="button fill no"> {{$t('exit')}}} </a>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      ids: [],
      total_shipment: 0,
    };
  },
  mounted() {
    if (this.$route.params.id) {
      this.$store.dispatch("order/show", { id: this.$route.params.id });
      this.$store.dispatch("settings/index");
      this.$store.dispatch("order_item/index", {
        order_id: this.$route.params.id,
      });
      this.ids = this.items.map((v) => v.item_id);
      if (this.ids.length > 0) {
        this.$store.dispatch("shippinga/index", { ids: this.ids });
      }
    }
  },
  computed: {
    ...mapState({
      order: (state) => state.order.one,
      address: (state) => state.address.one,
      settings: (state) => state.setting.all || [],
      items: (state) => state[`order_item`].all,
      shippingas: (state) => state.shippinga.all || [],
    }),
    totals() {
      let allTotlas = {
        total: 0,
        discount: 0,
        total_taxed: 0,
      };
      if (this.order.items) {
        let all_items = this.items;

        allTotlas.total = all_items.reduce(
          (c, n) => c + n.item_price * n.item_quantity,
          0
        );
        allTotlas.discount = all_items.reduce(
          (c, n) => c + n.discount * n.item_quantity,
          0
        );
        allTotlas.total_taxed = all_items.reduce((c, n) => {
          let price =
            n.item_price * n.item_quantity - n.discount * n.item_quantity;
          let taxe = price * (n.tax_percentage / 100);
          return (
            c +
            (n.item_price * n.item_quantity - n.discount * n.item_quantity) +
            taxe
          );
        }, 0);
      }
      return allTotlas;
    },
    limit_shipment() {
      var price = this.settings.find(
        (v) => v.key == "limit_price_for_shipment"
      )?.value;
      return parseFloat(price);
    },
    total_taxes() {
      if (this.items) {
        let all_items = this.items;
        return all_items.reduce((c, n) => {
          let price =
            n.item_price * n.item_quantity - n.discount * n.item_quantity;
          let taxes = price * (n.tax_percentage / 100);
          return c + taxes;
        }, 0);
      }
    },
  },
  watch: {
    order(val) {
      if (val) {
        this.$store.dispatch("address/show", { id: val.address_id });
      }
    },
    shippingas(val) {
      if (val) {
        this.total_shipment = val.reduce((c, n) => c + n.price, 0);
      }
    },
  },
  methods: {
    retry() {
      let domain = `${process.env.URL || window.location.protocol}//${
        window.location.host
      }`;
      return `${domain}/complete-order/${this.order.id}`;
    },
  },
};
</script>


<style>
</style>