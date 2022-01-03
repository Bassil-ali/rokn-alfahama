<template>
  <div class="col-md-10">
    <div class="entry-content-myaccount address form">
      <h2>{{ $t("Add_a_new_site") }}</h2>
      <form @submit.prevent="save(item)">
        <div class="row">
          <div class="col-md-12">
            <div class="mb-3">
              <label>{{ $t("address_name") }} <span>*</span></label>
              <input
                type="text"
                v-model="item.title_name"
                class="form-control"
                :placeholder="$t('address_name')"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>{{ $t("site") }} <span>*</span></label>
              <input
                type="text"
                v-model="item.area"
                class="form-control"
                :placeholder="$t('site')"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>{{ $t("widget") }} <span>*</span></label>
              <input
                type="text"
                v-model="item.widget"
                class="form-control"
                :placeholder="$t('widget')"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label>{{ $t("street") }} <span>*</span></label>
              <input
                type="text"
                v-model="item.street"
                class="form-control"
                :placeholder="$t('street')"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>{{ $t("Avenue") }}</label>
              <input
                type="text"
                v-model="item.avenue"
                class="form-control"
                :placeholder="$t('Avenue')"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label>{{ $t("house_number") }} <span>*</span></label>
              <input
                type="text"
                v-model="item.house_number"
                class="form-control"
                :placeholder="$t('house_number')"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>{{ $t("Floor_No") }}</label>
              <input
                type="text"
                v-model="item.floor_no"
                class="form-control"
                :placeholder="$t('Floor_No')"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label>{{ $t("Apartment_number") }}</label>
              <input
                type="text"
                v-model="item.apartment_number"
                class="form-control"
                :placeholder="$t('Apartment_number')"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>{{ $t("Notes") }}</label>
              <input
                type="text"
                v-model="item.notes"
                class="form-control"
                :placeholder="$t('Notes')"
              />
            </div>
          </div>
        </div>
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
      this.$store.dispatch("address/store", item);
    },
  },
  computed: {
    ...mapState({
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
