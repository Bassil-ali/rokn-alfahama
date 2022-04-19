<template>
  <div class="col-md-10">
    <div class="entry-content-myaccount address form">
      <h2>{{ $t("Add_a_new_site") }}</h2>
      <form @submit.prevent="save(item)">
        <div class="row">
          <div class="col-md-12">
           
          <div class="mb-3">
            <label>{{ $t("street_address") }} <span>*</span></label>
            <input
              type="text"
              required
              v-model="item.street_address"
              class="form-control"
              :placeholder="$t('street_address')"
            />
          </div>

          <div class="mb-3">
            <label
              >Apt, Suit, Building ({{ $t("optional") }})<span>*</span></label
            >
            <input
              type="text"
              v-model="item.apt_suit_building"
              class="form-control"
              placeholder="apt suit building"
            />
          </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>Zip Code <span>*</span></label>
              <input
                type="text"
                required
                v-model="item.zip_code"
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
                v-model="item.city"
                class="form-control"
                :placeholder="$t('city')"
              />
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label>{{ $t("country_region") }} <span>*</span></label>
              <input
                type="text"
                required
                v-model="item.country_region"
                class="form-control"
                :placeholder="$t('country_region')"
              />
            </div>
          </div>
        </div>
        <br>
        <button type="submit" class="button">{{ $t("add_site") }}</button>
      </form>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      item: {},
    };
  },
  mounted() {
    if (this.$route.params.eid) {
      this.$store.dispatch("address/show", { id: this.$route.params.eid });
    }
  },
  methods: {
    save(item) {
      item.user_id = this.user.id;
      item.email = this.user.email;
      item.phone_number = this.user.mobile;
      item.first_name = this.user.name;
      item.last_name = this.user.user_name;

      this.$store.dispatch("address/store", item);
    },
  },
  computed: {
    ...mapState({
      user: (state) => state.auth.user.user,
      one: (state) => state.address.one,
    }),
  },
  watch: {
    one(val) {
      if (val) {
        this.item = JSON.parse(JSON.stringify(val));
      }
    },
  },
};
</script>
