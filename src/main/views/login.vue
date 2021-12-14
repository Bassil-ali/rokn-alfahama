<template>
  <div class="bg-myacoutn">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="form">
            <h2>أهلا وسهلا بك</h2>
            <p><small>تسجيل الدخول في موقعنا</small></p>
            <form @submit.prevent="login(user)">
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fas fa-envelope"></i
                ></span>
                <input
                  v-model="user.email"
                  type="email"
                  class="form-control"
                  placeholder="ادخال اسم المستخدم او البريد الالكتروني"
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
                  placeholder="كلمة المرور"
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
                    تذكرنى
                  </label>
                </div>
                <a href=""><strong>هل نسيت كلمة المرور؟</strong></a>
              </div>
              <button type="submit" class="button">تسجيل دخول</button>
            </form>
            <p class="text-center mt-3 mb-0">
              لا يوجد لدي حساب؟ <a href=""><strong>انشاء حساب</strong></a>
            </p>
          </div>
        </div>
        <div class="col-md-7">
          <div class="left">
            <h3>أنا عميل جديد</h3>
            <p>
              انشاء حساب سريع وسهل ومجاني. ستكون قادرًا على إدارة عملياتك الآلية
              ، وتتبع طلباتك ، وكتابة التعليقات ، والمزيد!
            </p>
            <a href="" class="button">إنشاء حساب</a>
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
      this.$store.dispatch("auth/login", user).then(() => {
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
      });
    },
  },
};
</script>
