<template>
  <div class="col-md-10">
    <div class="entry-content-myaccount address form">
      <h2>اضافة موقع جديدة</h2>
      <form @submit.prevent="save(item)">
        <div class="row">
          <div class="col-md-12">
            <div class="mb-3">
              <label>اسم العنوان <span>*</span></label>
              <input
                type="text"
                class="form-control"
                v-model="item.title_name"
                placeholder="اضافة اسم العنوان"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>المنطقة <span>*</span></label>
              <input
                type="text"
                class="form-control"
                v-model="item.area"

                placeholder="اضافة اسم المنطقة"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>القطعة <span>*</span></label>
              <input
                type="text"
                class="form-control"
                v-model="item.widget"

                placeholder="اضافة اسم القطعة"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label>الشارع <span>*</span></label>
              <input
                type="text"
                class="form-control"
                v-model="item.street"

                placeholder="اضافة اسم الشارع"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>جادة</label>
              <input
                type="text"
                class="form-control"
                v-model="item.avenue"

                placeholder="اضافة اسم الجادة"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label>رقم المنزل <span>*</span></label>
              <input
                type="text"
                class="form-control"
                v-model="item.house_number"

                placeholder="اضافة رقم المنزل"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>رقم الطابق</label>
              <input
                type="text"
                class="form-control"
                v-model="item.floor_no"

                placeholder="اضافة رقم الطابق"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label>رقم الشقة</label>
              <input
                type="text"
                class="form-control"
                v-model="item.apartment_number"

                placeholder="اضافة رقم الشقة"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label>ملاحظات</label>
              <input
                type="text"
                class="form-control"
                v-model="item.notes"

                placeholder="اضافة الملاحظات"
              />
            </div>
          </div>
        </div>
        <button type="submit" class="button">اضافة الموقع</button>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data(){
    return {
      item:{}
    }
  },
  methods:{
    save(item){
      this.$store.dispatch('address/store',item);
    }
  }
}
</script>