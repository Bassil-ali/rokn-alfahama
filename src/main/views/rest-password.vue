<template>
  <div class="entry-content page-404 position-relative">
    <div style="margin-top: -330px" class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <form style="z-index: 99" @submit.prevent="save(item)">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label>{{ $t("Enter Your Email") }}</label>
                <div class="input-group">
                  <span class="input-group-text"
                    ><i class="fas fa-key"></i
                  ></span>
                  <input
                    required
                    v-model="item.email"
                    type="email"
                    class="form-control"
                    :placeholder="$t('Enter Your Email')"
                  />
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label>{{ $t("New Password") }}</label>
                <div class="input-group">
                  <span class="input-group-text"
                    ><i class="fas fa-lock"></i
                  ></span>
                  <input
                    required
                    v-model="item.password"
                    type="password"
                    class="form-control"
                    :placeholder="$t('New Password')"
                  />
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label>{{ $t("Confirm New Password") }}</label>
                <div class="input-group">
                  <span class="input-group-text"
                    ><i class="fas fa-lock"></i
                  ></span>
                  <input
                    required
                    v-model="item.password_confirmation"
                    type="password"
                    class="form-control"
                    :placeholder="$t('Confirm New Password')"
                  />
                </div>
              </div>
            </div>
            <button style="color: white" type="submit" class="button">
              {{ $t("confirm") }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      item: { silent: true },
    };
  },
  methods: {
    save(item) {
      this.$store.dispatch("reset-password/store", item).then((res) => {
        alert(res.data);
        if (res.status == 200) {
          this.$router.push("/login");
        }
      });
    },
  },
  mounted() {
    
    if (this.$route.query.token) {
      this.item.resetToken = this.$route.query.token;
    } else {
      this.$router.push("/");
    }
  },
};
</script>
