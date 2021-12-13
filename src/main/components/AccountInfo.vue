<template>
  <div class="col-md-10">
    <div class="entry-content-myaccount form">
      <h2>معلومات شخصية</h2>

      <form @submit.prevent="update">
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input
                type="text"
                class="form-control"
                v-model="user.name"
                placeholder="ادخل الاسم كامل"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input
                type="text"
                class="form-control"
                placeholder="ادخل اسم المستخدم"
                v-model="user.user_name"
              />
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text"
                ><i class="fas fa-mobile-alt"></i
              ></span>
              <input
                type="text"
                class="form-control"
                placeholder="ادخل رقم الجوال"
                v-model="user.mobile"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text"
                ><i class="fas fa-envelope"></i
              ></span>
              <input
                type="email"
                class="form-control"
                v-model="user.email"
                placeholder="ادخل البريد الالكتروني"
              />
            </div>
          </div>
        </div>
        <button type="submit" class="button">تحديث البيانات</button>
      </form>
    </div>
  </div>
</template>
<script>
import { mapState } from "vuex";
export default {
  computed: {
    ...mapState({
      user: (state) => state.auth.user.user,
    }),
  },
  methods: {
    update() {
      this.$store.dispatch("user/update", this.user);
    },
  },
};
</script>