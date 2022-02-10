<template>
  <div class="col-md-10">
    <div class="entry-content-myaccount address">
      <h2>{{ $t("my_info") }}</h2>
      <div class="items">
        <div class="box address" v-for="address in addresses" :key="address.id">
          <div class="d-flex">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="flexCheckDefault"
              />
              <label class="form-check-label" for="flexCheckDefault"> </label>
            </div>
            <div>
              <div class="d-flex justify-content-between align-items-center">
                <strong
                  ><i class="fas fa-map-marker-alt"></i>
                  {{ address.first_name }}
                </strong>
                <div class="option">
                  <!-- :href="`/main/my-account/my_addresses/${address.id}`" -->
                  <a
                    @click="
                      $router.push({
                        name: 'my-account',
                        params: { id: 'add_address', eid: address.id },
                      })
                    "
                    data-title="تعديل"
                    ><img src="@/main/assets/images/edit.svg" alt=""
                  /></a>
                  <a @click="deleteAddress(address)" data-title="حذف"
                    ><img src="@/main/assets/images/delete.svg" alt=""
                  /></a>
                </div>
              </div>
              <ul>
                <li>
                  {{ address.first_name }} - {{ address.last_name }} -
                  {{ address.street_address }} - {{ address.apt_suit_building }} -
                  {{ address.zip_code }} - {{ address.city }} -
                  {{ address.country_region }} - {{ address.email }} -
                  {{ address.phone_number }}
                </li>
                <!-- <li>
                  {{ address.notes }}
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
      <router-link to="add_address" class="button"
        ><img src="assets/images/pin-add.svg" alt="" />{{
          $t("add_site_new")
        }}</router-link
      >
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  mounted() {
    this.$store.dispatch("address/index" , {user_id:this.$root.user.id});
  },
  computed: {
    ...mapState({
      addresses: (state) => state.address.all,
    }),
  },
  methods: {
    deleteAddress(item) {
      this.$store.dispatch("address/delete", item);
    },
  },
};
</script>