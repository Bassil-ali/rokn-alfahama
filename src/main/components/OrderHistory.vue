<template>
  <div class="col-md-10">
    <div class="entry-content-myaccount order-details">
      <h2>
        {{ $t("The_date_of_order") }} <br />
        <br />
        <span v-if="!payments">
          {{ $t("no orders yet") }}
        </span>
      </h2>
      <table v-if="payments" class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">{{ $t("order_date") }}</th>
            <th scope="col">{{ $t("The_date_of_order") }}</th>
            <th scope="col">{{ $t("status") }}</th>
            <th scope="col">{{ $t("total_summation") }}</th>
          </tr>
        </thead>
        <tbody>
          <tr :key="i" v-for="(payment, i) in payments">
            <td>
              {{ i + 1 }}
              <!-- <figure class="mb-0">
                <img
                  src="assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg"
                  alt=""
                />
              </figure> -->
            </td>
            <td>{{ payment.order.issue_date }}</td>
            <td>{{ payment.updated_at }}</td>
            <td>{{ payment.status == 1 ? $t("completed") : $t("pending") }}</td>
            <td>{{ payment.amount }} $</td>
          </tr>
        </tbody>
      </table>
      <h2>{{ $t("Shipping_place") }}</h2>
      <div class="box address">
        <strong
          ><i class="fas fa-map-marker-alt"></i> {{ $t("address") }}</strong
        >
        <ul v-if="payments">
          <li :key="i" v-for="(address, i) in getAddresses(payments)">
            {{ address }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      all_address: [],
    };
  },
  mounted() {
    this.$store.dispatch("payment/index", { user_id: this.$root.user.id });
  },
  computed: {
    ...mapState({
      payments: (state) => state.payment.all,
    }),
  },
  methods: {
    getAddresses(payments) {
      payments.forEach((payment) => {
        if (payment.order) {
          if (payment.order.addresses) {
            payment.order.addresses.forEach((address) =>
              this.all_address.push(address)
            );
            return this.all_address;
          }
          return [];
        }
        return [];
      });
    },
  },
};
</script>

