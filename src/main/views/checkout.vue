<template>
  <div class="container">
    <div class="entry-content checkout">
      <h2>{{ $t("Checkout") }}</h2>

      <div class="row">
        <div class="col-md-4">
          <div class="block">
            <h4>{{ $t("Order_information") }}</h4>
            <div class="orders">
              <div
                class="order-item"
                v-for="item in order.items"
                :key="item.id"
              >
                <div class="d-flex">
                  <a @click="remove(item)" class="del"
                    ><img src="@/main/assets/images/del.svg" alt=""
                  /></a>
                  <figure>
                    <img :src="item.image" alt="" />
                  </figure>
                  <div class="caption">
                    <h2>{{ item.name }}</h2>
                    <div class="d-flex justify-content-between">
                      <div class="price">
                        {{ item.item_price - item.discount }}
                        $ <br />
                        <span
                          v-if="item.discount > 0"
                          style="
                            float: left;
                            color: #9f9f9f;
                            text-decoration: line-through;
                            font-weight: 500;
                          "
                        >
                          {{ item.item_price }}
                          $
                        </span>
                      </div>
                      <div class="quantity d-flex align-items-center">
                        <div id="quantity" class="d-flex align-items-center">
                          <button
                            @click="decrement(item)"
                            class="btn-subtract"
                            type="button"
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
                            @click="increment(item)"
                            class="btn-add"
                            type="button"
                          >
                            +
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <form action="" class="copon" @submit.prevent="addCoupon">
              <input
                type="text"
                :placeholder="$t('Enter_the_coupon_code')"
                v-model="item.coupon"
              />
              <button>{{ $t("Activate_the_coupon") }}</button>
            </form>
            <div class="footer">
              <ul>
                <li>
                  {{ $t("number_of_products") }}
                  <span>{{
                    order.items
                      ? order.items.reduce(
                          (c, n) => c + parseInt(n.item_quantity),
                          0
                        )
                      : 0
                  }}</span>
                </li>
                <li>
                  {{ $t("total_summation") }}
                  <span>
                    {{ totals.total }}
                    $</span
                  >
                </li>
                <li>
                  {{ $t("Discount") }}
                  <span>
                    {{ totals.discount }}
                    $</span
                  >
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
                    {{ total_shipment.toFixed(2) }}
                    $
                  </span>

                  <span v-else> {{ total_shipment.toFixed(2) }} $</span>
                </li>
                <li>
                  {{ $t("tax_total") }}

                  <span> + {{ parseFloat(total_taxes).toFixed(2) }} $</span>
                </li>
                <li class="toot">
                  {{ $t("total_summation") }}
                  <span v-if="totals.total_taxed > limit_shipment">
                    {{ totals.total_taxed.toFixed(2) }}
                    $</span
                  >
                  <span v-else>
                    {{
                      parseFloat(totals.total_taxed + total_shipment).toFixed(2)
                    }}
                    $</span
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="block">
            <h4>{{ $t("Delivery_details") }}</h4>
            <div class="row justify-content-center">
              <div class="col-md-11">
                <div class="content">
                  <div style="display: flex; justify-content: space-around">
                    <p v-if="$root.user">
                      {{ $t("register_as") }} :
                      <strong>{{ $root.user.name }}</strong>
                    </p>
                    <p v-if="$root.user">
                      {{ $t("your email") }} :
                      <strong>{{ $root.user.email }}</strong>
                    </p>
                    <p v-if="$root.user">
                      {{ $t("your phone number") }} :
                      <strong>{{ $root.user.mobile }}</strong>
                    </p>
                  </div>

                  <div class="box">
                    <div
                      v-if="$root.user"
                      class="entry-content-myaccount address"
                    >
                      <h2>{{ $t("my_addresses") }}</h2>
                      <div class="items">
                        <div
                          class="box address"
                          v-for="address in addresses"
                          :key="address.id"
                        >
                          <div class="d-flex">
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="flexCheckDefault"
                                v-model="address.checked"
                                @input="checkAddress(address)"
                              />
                              <label
                                class="form-check-label"
                                for="flexCheckDefault"
                              >
                              </label>
                            </div>
                            <div>
                              <ul>
                                <li>
                                  {{ address.street_address }} -
                                  {{ address.apt_suit_building }} -
                                  {{ address.zip_code }} - {{ address.city }} -
                                  {{ address.country_region }}
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <a
                        href="/my-account/my_addresses"
                        class="button online"
                        >{{ $t("add_site_new") }}</a
                      >
                    </div>
                    <div v-else class="entry-content-myaccount address">
                      <h2>{{ $t("complete_order_quest") }}</h2>
                      <form @submit.prevent="saveAddress(address)" class="form">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="mb-3">
                              <label
                                >{{ $t("first_name") }} <span>*</span></label
                              >
                              <input
                                type="text"
                                required
                                v-model="gust_order.customer_first_name"
                                class="form-control"
                                :placeholder="$t('first_name')"
                              />
                            </div>
                            <div>
                              <label
                                >{{ $t("last_name") }} <span>*</span></label
                              >
                              <input
                                type="text"
                                required
                                v-model="gust_order.customer_last_name"
                                class="form-control"
                                :placeholder="$t('last_name')"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div>
                                <label>{{ $t("email") }} <span>*</span></label>
                                <input
                                  type="email"
                                  v-model="gust_order.customer_email"
                                  class="form-control"
                                  :placeholder="$t('email')"
                                />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label
                                  >{{ $t("phone_number") }}
                                  <span>*</span></label
                                >
                                <input
                                  type="number"
                                  required
                                  v-model="gust_order.customer_mobile"
                                  class="form-control"
                                  :placeholder="$t('phone_number')"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label
                              >{{ $t("street_address") }} <span>*</span></label
                            >
                            <input
                              type="text"
                              required
                              v-model="address.street_address"
                              class="form-control"
                              :placeholder="$t('street_address')"
                            />
                          </div>

                          <div class="mb-3">
                            <label
                              >Apt, Suit, Building ({{ $t("optional") }})<span
                                >*</span
                              ></label
                            >
                            <input
                              type="text"
                              v-model="address.apt_suit_building"
                              class="form-control"
                              placeholder="apt suit building"
                            />
                          </div>

                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>Zip Code <span>*</span></label>
                              <input
                                type="text"
                                required
                                v-model="address.zip_code"
                                class="form-control"
                                placeholder="Zip Code"
                              />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label>{{ $t("city") }} <span>*</span></label>
                              <input
                                type="text"
                                required
                                v-model="address.city"
                                class="form-control"
                                :placeholder="$t('city')"
                              />
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="mb-3">
                              <label
                                >{{ $t("country_region") }}
                                <span>*</span></label
                              >
                              <input
                                type="text"
                                required
                                v-model="address.country_region"
                                class="form-control"
                                :placeholder="$t('country_region')"
                              />
                            </div>
                          </div>
                        </div>

                        <br />

                        <button type="submit" class="button">
                          {{ $t("add_site") }}
                        </button>
                      </form>
                      <div style="text-align: center" v-if="localeAddresses[0]">
                        <h4>{{ $t("choose an address") }}</h4>
                      </div>
                      <div
                        :key="index"
                        v-for="(address, index) in localeAddresses"
                        class="d-flex"
                      >
                         
                        <input
                          class="form-check-input"
                          id="flexCheckDefault"
                          type="radio"
                          @input="() => (selectedLocalAddress = address)"
                          name="fav_language"
                        />
                         

                        <label for="css">
                          <ul>
                            <li>
                              {{ address.street_address }} -
                              {{ address.apt_suit_building }} -
                              {{ address.zip_code }} - {{ address.city }} -
                              {{ address.country_region }}
                              <a
                                style="cursor: pointer"
                                @click="removeLocalAddress(index)"
                                ><i class="fas fa-times"></i
                              ></a>
                            </li>
                            <!-- <li>
                              {{ address.notes }}
                            </li> -->
                          </ul></label
                        ><br />
                      </div>
                    </div>

                    <div class="pay-box form">
                      <!--                       
                      <h6>اختار طريقة الشحن</h6> -->
                      <form @submit.prevent="save">
                        <button :disabled="!validated" class="button">
                          {{ $t("Complete_the_order") }}
                        </button>
                      </form>
                      <p>{{ $t("agree_condision") }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center infoo">
        <div class="col-md-10 text-center">
          <p>
            {{ $t("security_text") }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  mounted() {
    if (this.$root.user) {
      this.$store.dispatch("address/index", { user_id: this.$root.user.id });
    } else {
      if (localStorage.getItem("address")) {
        this.localeAddresses = JSON.parse(localStorage.getItem("address"));
      }
    }
    this.ids = this.order.items.map((v) => v.item_id);
    if (this.ids.length > 0) {
      this.$store.dispatch("shippinga/index", { ids: this.ids });
    }
    // this.$store.dispatch("shipping/index");
    // if (this.$attrs.id) {
    //   this.$store.dispatch("order/show", { id: this.$attrs.id });
    // } else {
    //   this.$router.push("/");
    // }
  },
  data() {
    return {
      selectedLocalAddress: null,
      localeAddresses: [],
      add: null,
      address: {},
      gust_order: {},
      selected_shipment: null,
      valid_selected_shipment: false,
      total_shipment: 0,
      my_address: null,
      ids: [],
      item: {
        shipment_price: 0,
        discount: 0,
        total: 0,
        item_quantity: 1,
      },
    };
  },
  methods: {
    remove(item) {
      this.$store.dispatch("cart/removeItem", item);
    },
    checkedLocale(index) {
      console.log(index);
      this.localeAddresses.map((v, i) => {
        console.log(i);
        return i == index ? (v.checked = true) : (v.checked = false);
      });
    },
    increment(item) {
      this.$store.dispatch("cart/incrementItem", item);
    },
    decrement(item) {
      this.$store.dispatch("cart/decrementItem", item);
    },
    getTime() {
      var date = new Date();
      return date.toISOString().slice(0, 19).replace("T", " ");
    },
    async save() {
      if (this.$root.user) {
        let order_copy = JSON.parse(JSON.stringify(this.order));
        delete order_copy.items;

        order_copy.due_date = this.getTime();
        order_copy.status = 1;
        order_copy.taxed_total = this.totals.total_taxed;
        order_copy.discount = this.totals.discount;
        order_copy.total = this.totals.total;
        order_copy.address_id = this.my_address;
        if (this.totals.total_taxed < this.limit_shipment) {
          order_copy.taxed_total += this.total_shipment;
          order_copy.total_shipping = this.total_shipment;
        }

        await this.$store.dispatch("order/store", order_copy).then(() => {
          let domain = `${process.env.URL || window.location.protocol}//${
            window.location.host
          }`;
          window.open(`${domain}/complete-order/${this.order.id}`);
          this.$router.push("/cart");
          location.reload();
        });
      } else {
        if (
          !(
            this.gust_order.customer_email &&
            this.gust_order.customer_last_name &&
            this.gust_order.customer_first_name &&
            this.gust_order.customer_mobile
          )
        ) {
          alert("complete the fields ");
          return;
        } else if (!this.selectedLocalAddress) {
          alert("choose an address");
        }

        let order = { ...this.gust_order };
        order.due_date = this.getTime();
        order.issue_date = this.getTime();
        order.status = 1;
        order.taxed_total = this.totals.total_taxed;
        order.discount = this.totals.discount;
        order.total = this.totals.total;
        if (this.totals.total_taxed < this.limit_shipment) {
          order.taxed_total += this.total_shipment;
          order.total_shipping = this.total_shipment;
        }
        localStorage.removeItem("order");
        await this.$store
          .dispatch("address/store", this.selectedLocalAddress)
          .then((address) => {
            if (address) {
              order.address_id = address.id;
              this.$store.dispatch("order/store", order).then((new_order) => {
                this.order.items.map((item) => {
                  this.$store
                    .dispatch("order_item/store", {
                      ...item,
                      order_id: new_order.id,
                    })
                    .then(() => {
                      let domain = `${
                        process.env.URL || window.location.protocol
                      }//${window.location.host}`;
                      window.open(`${domain}/complete-order/${new_order.id}`);
                      this.$router.push("/cart");
                      location.reload();
                    });
                });
              });
            }
          });
      }
      // if (order_id) {

      // }
    },
    removeLocalAddress(index) {
      let addresses = JSON.parse(localStorage.getItem("address"));
      addresses.splice(index, 1);
      localStorage.setItem("address", JSON.stringify(addresses));
      this.localeAddresses = JSON.parse(localStorage.getItem("address"));
    },
    saveAddress(item) {
      console.log(this.gust_order.customer_email);
      const validateEmail = (email) => {
        return email.match(
          /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
      };
      const email = this.gust_order.customer_email;

      if (validateEmail(email ?? "invalid")) {
        if (localStorage.getItem("address")) {
          let addresses = JSON.parse(localStorage.getItem("address"));
          addresses.push(item);
          localStorage.setItem("address", JSON.stringify(addresses));
        } else {
          localStorage.setItem("address", JSON.stringify([item]));
        }
        this.localeAddresses = JSON.parse(localStorage.getItem("address"));
      } else {
        this.$swal.fire({
          title: this.$t('error'),
          text: this.$t('email_error'),
          icon: "error",
          confirmButtonText: "تم",
          confirmButtonColor: "#41b882",
        });
      }
    },

    addCoupon() {
      this.$store
        .dispatch("coupon/show", { id: this.item.coupon })
        .then((data) => {
          this.$store.dispatch("cart/setDiscount", data.value);
        });
    },
    checkAddress(address) {
      this.my_address = address.id;
      this.addresses
        .filter((i) => i.id != address.id)
        .map((i) => (i.checked = false));
    },
  },
  computed: {
    ...mapState({
      order: (state) => state.cart.order,
      addresses: (state) => state.address.all,
      settings: (state) => state.setting.all || [],
      // shipments: (state) => state.shipping.all || [],
      shippingas: (state) => state.shippinga.all || [],
    }),

    validated() {
      if (this.$root.user) {
        if (this.my_address && this.totals.total_taxed > 0) {
          return true;
        } else {
          return false;
        }
      } else {
        if (
          Object.keys(this.gust_order).length > 2 &&
          this.selectedLocalAddress
        ) {
          return true;
        } else {
          return false;
        }
      }
    },
    totals() {
      let allTotlas = {
        total: 0,
        discount: 0,
        total_taxed: 0,
      };
      if (this.order.items) {
        let all_items = this.order.items;

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
    shipment_price() {
      var price = this.settings.find((v) => v.key == "shipment_amount")?.value;
      return parseFloat(price);
    },
    total_taxes() {
      if (this.order.items) {
        let all_items = this.order.items;
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
    order: {
      handler(val) {
        if (val) {
          this.ids = val.items.map((v) => v.item_id);
          if (this.ids.length > 0) {
            this.$store.dispatch("shippinga/index", { ids: this.ids });
          }
        }
      },
      deep: true,
    },
    // selected_shipment(val) {
    //   if (val && this.ids) {
    //     this.$store.dispatch("shippinga/index", { ids: this.ids });
    //   }
    // },
    shippingas(val) {
      // if (val.length > 0) {
      //   if (val.length != this.order.items.length) {
      //     this.valid_selected_shipment = false;
      //     alert("cant choose this shipment method");
      //   } else {
      //     this.valid_selected_shipment = true;
      //     this.total_shipment = val.reduce((c, n) => c + n.price, 0);
      //   }
      // }
      if (val) {
        this.total_shipment = val.reduce((c, n) => c + parseFloat(n.price), 0);
      }
    },
  },
};
</script>
