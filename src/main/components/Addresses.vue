<template>
  <div class="col-md-10">
    <div class="entry-content-myaccount address">
      <h2>عناويني</h2>
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
            <div >
              <div class="d-flex justify-content-between align-items-center">
                <strong><i class="fas fa-map-marker-alt"></i> 
                  {{address.title_name}}
                </strong>
                <div class="option">
                  <a href="" data-title="تعديل"
                    ><img src="@/main/assets/images/edit.svg" alt=""
                  /></a>
                  <a href="" data-title="حذف"
                    ><img src="@/main/assets/images/delete.svg" alt=""
                  /></a>
                </div>
              </div>
              <ul>
                  <li>
                    {{address.area}} - {{address.widget}}
                    - {{address.street}}
                    - {{address.avenue}}
                    - {{address.house_number}}
                    - {{address.floor_no}}
                    - {{address.apartment_number}}
                  </li>
                  <li>
                    {{address.notes}}
                  </li>
                 </ul>
            </div>
          </div>
        </div>
      </div>
      <router-link to="add_address" class="button"
        ><img src="assets/images/pin-add.svg" alt="" />اضافة موقع
        جديد</router-link
      >
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  mounted() {
    this.$store.dispatch("address/index");
  },
  computed: {
    ...mapState({
      addresses: (state) => state.address.all,
    }),
  },
};
</script>