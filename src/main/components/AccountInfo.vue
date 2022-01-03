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
              disabled
                type="text"
                class="form-control"
                v-model="user.name"
                :placeholder="$t('full_name')"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input
                type="text"
                class="form-control"
                :placeholder="$t('enter_username')"
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
                :placeholder="$t('mobile_no')"
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
                disabled
                class="form-control"
                v-model="user.email"
                :placeholder="$t('email')"
              />
            </div>
          </div>
        </div>
        <button type="submit" class="button">{{ $t("update") }}</button>
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
