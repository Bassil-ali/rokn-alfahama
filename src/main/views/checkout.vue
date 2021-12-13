<template>
  <div class="container">
    <div class="entry-content checkout">
      <h2>إتمام عملية الشراء</h2>

      <div class="row">
        <div class="col-md-4">
          <div class="block">
            <h4>معلومات الطلب</h4>
            <div class="orders">
              <div class="order-item" v-for="item in items" :key="item.id">
                <div class="d-flex">
                  <a href="" class="del"
                    ><img src="@/main/assets/images/del.svg" alt=""
                  /></a>
                  <figure>
                    <img :src="item.image" alt="" />
                  </figure>
                  <div class="caption">
                    <h2>{{ item.name }}</h2>
                    <div class="d-flex justify-content-between">
                      <div class="price">
                        {{ item.item_price * item.item_quantity }} ر.س
                      </div>
                      <div class="quantity d-flex align-items-center">
                        <div id="quantity" class="d-flex align-items-center">
                          <button class="btn-subtract" type="button">-</button>
                          <input
                            type="number"
                            class="item-quantity"
                            min="0"
                            value="1"
                          />
                          <button class="btn-add" type="button">+</button>
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
                placeholder="ادخل رمز الكوبون"
                v-model="item.coupon"
              />
              <button>تفعيل الكوبون</button>
            </form>
            <div class="footer">
              <ul>
                <li>
                  عدد المنتجات
                  <span>{{
                    items.reduce((c, n) => c + n.item_quantity, 0)
                  }}</span>
                </li>
                <li>
                  المجموع
                  <span
                    >{{
                      (item.total = items.reduce(
                        (c, n) => c + n.item_price * n.item_quantity,
                        0
                      ))
                    }}
                    ر.س</span
                  >
                </li>
                <li>
                  الخصم
                  <span
                    >{{
                      (item.discount = items.reduce(
                        (c, n) =>
                          c +
                          (n.item_price * n.item_quantity * (n.discount || 0)) /
                            100,
                        0
                      ))
                    }}
                    ر.س</span
                  >
                </li>
                <li>
                  سعر التوصيل <span>{{ item.shipment_price }} ر.س</span>
                </li>
                <li class="toot">
                  المجموع الكلي
                  <span
                    >{{
                      item.total - item.discount + item.shipment_price
                    }}
                    ر.س</span
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="block">
            <h4>تفاصيل التسليم</h4>
            <div class="row justify-content-center">
              <div class="col-md-11">
                <div class="content">
                  <p>
                    أنت مسجل باسم : <strong>{{ user.name }}</strong>
                  </p>
                  <div class="box">
                    <div class="entry-content-myaccount address">
                      <h2>عناويني</h2>
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
                                  {{ address.area }} - {{ address.widget }} -
                                  {{ address.street }} - {{ address.avenue }} -
                                  {{ address.house_number }} -
                                  {{ address.floor_no }} -
                                  {{ address.apartment_number }}
                                </li>
                                <li>
                                  {{ address.notes }}
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <a href="" class="button online">اضافة موقع جديد</a>
                    </div>
                    <div class="pay-box form">
                      <h6>أختر طريقة الدفع</h6>
                      <form @submit.prevent="save">
                        <div class="d-flex">
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="inlineRadioOptions"
                              id="inlineRadio1"
                              value="option1"
                            />
                            <label class="form-check-label" for="inlineRadio1"
                              >كي نت
                              <img
                                src="@/main/assets/images/magento2-knet-payment-gateway.jpg"
                                alt=""
                            /></label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="inlineRadioOptions"
                              id="inlineRadio2"
                              value="option2"
                            />
                            <label class="form-check-label" for="inlineRadio2"
                              >مستر كود وفيزا
                              <img src="@/main/assets/images/visa.jpg" alt=""
                            /></label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="inlineRadioOptions"
                              id="inlineRadio3"
                              value="option3"
                            />
                            <label class="form-check-label" for="inlineRadio3"
                              >كاش
                              <img src="@/main/assets/images/wallet.jpg" alt=""
                            /></label>
                          </div>
                        </div>
                        <button class="button">إتمام الطلب</button>
                      </form>
                      <p>
                        بالضغط على اتمام الطلب انت توافق على جميع الشروط
                        والقوانين
                      </p>
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
            الدفع لدينا آمان . يتم إرسال معلوماتك الشخصية ومعلومات الدفع الخاصة
            بك بشكل امن لانقوم بتخزين أي معلومات بطاقة دفع على منصتنا
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
    this.$store.dispatch("address/index");
  },
  data() {
    return {
      item: {
        shipment_price: 0,
        discount: 0,
        total: 0,
      },
    };
  },
  methods: {
    save() {
      this.item.issue_date= new Date(Date.now());
      this.item.status=1;
      this.item.taxed_total=this.item.total;
      this.$store.dispatch("order/store", this.item);
    },
    addCoupon() {
      this.$store.dispatch("coupon/show",{id: this.item.coupon}).then((data) => {
        this.$store.dispatch("cart/setDiscount", data.value);
      });
    },
    checkAddress(address){
      this.item.address_id = address.id;
      this.addresses.filter(i=>i.id!=address.id).map(i=>i.checked=false);
    }
  },
  computed: {
    ...mapState({
      items: (state) => state.cart.items,
      user: (state) => state.auth.user.user,
      addresses: (state) => state.address.all,
    }),
  },
};
</script>
