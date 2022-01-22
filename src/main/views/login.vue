<template>
  <div class="bg-myacoutn">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="form">
            <h2>{{ $t("welcome") }}</h2>
            <p>
              <small>{{ $t("Log_in_to_our_site") }}</small>
            </p>
            <form @submit.prevent="login(user)">
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fas fa-envelope"></i
                ></span>
                <input
                  v-model="user.email"
                  type="email"
                  class="form-control"
                  :placeholder="$t('username_email')"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fas fa-lock"></i
                ></span>
                <input
                  v-model="user.password"
                  type="password"
                  class="form-control"
                  :placeholder="$t('password')"
                />
              </div>
              <div class="d-flex mb-3 justify-content-between">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                  />
                  <label class="form-check-label" for="flexCheckDefault">
                    {{ $t("remember_me") }}
                  </label>
                </div>
                <a href=""
                  ><strong>{{ $t("forget_pass") }}</strong></a
                >
              </div>
              <button type="submit" class="button">{{ $t("Login") }}</button>
            </form>
            <p class="text-center mt-3 mb-0">
              {{ $t("account_not") }}
              <a href="/main/register"
                ><strong>{{ $t("Create_account") }}</strong></a
              >
            </p>
          </div>
        </div>
        <div class="col-md-7">
          <div class="left">
            <h3>{{ $t("new_customer") }}</h3>
            <p>
              {{ $t("new_customer_message") }}
            </p>
            <a href="/main/register" class="button">{{
              $t("Create_account")
            }}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      user: {},
    };
  },
  methods: {
    login(user) {
      this.$store.dispatch("auth/login", user).then((data) => {
        if (data == 200) {
          this.$swal
            .fire({
              title: "أهلاً بك",
              text: "تم تسجيل دخولك بنجاح",
              icon: "success",
              confirmButtonText: "تم",
              confirmButtonColor: "#41b882",
            })
            .then(() => {
              this.$router.push("/");
            });
        } else {
          this.$swal.fire({
            title: "خطأ",
            text: "خطأ في كلمة المرور او البريد الإلكتروني",
            icon: "error",
            confirmButtonText: "تم",
            confirmButtonColor: "#f11818",
          });
        }
      });
    },
  },
};
</script>
