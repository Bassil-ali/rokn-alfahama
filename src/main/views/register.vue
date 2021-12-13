<template>
  <div class="bg-myacoutn">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="form">
            <h2>أهلا وسهلا بك</h2>
            <p><small>انشاء حساب في موقعنا</small></p>
            <form @submit.prevent="$root.save(item,'user')">
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fas fa-user"></i
                ></span>
                <input
                  v-model="item.name"
                  type="text"
                  class="form-control"
                  placeholder="ادخل الاسم كامل"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fas fa-user"></i
                ></span>
                <input
                  v-model="item.user_name"
                  type="text"
                  class="form-control"
                  placeholder="ادخل اسم المستخدم"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fas fa-mobile-alt"></i
                ></span>
                <input
                  v-model="item.mobile"
                  type="text"
                  class="form-control"
                  placeholder="ادخل رقم الجوال"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fas fa-envelope"></i
                ></span>
                <input
                  v-model="item.email"
                  type="email"
                  class="form-control"
                  placeholder="ادخل البريد الالكتروني"
                />
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fas fa-lock"></i
                ></span>
                <input
                  v-model="item.password"
                  type="password"
                  class="form-control"
                  placeholder="ادخل كلمة المرور"
                />
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                  />
                  <label class="form-check-label" for="flexCheckDefault">
                    هل انت موافق على <a href="">شروط الاستخدام</a>
                  </label>
                </div>
              </div>
              <button type="submit" class="button">
                انشاء حساب
              </button>
            </form>
            <p class="text-center mt-3 mb-0">
              هل لديك حساب سابق؟ <a href=""><strong>تسجيل دخول</strong></a>
            </p>
          </div>
        </div>
        <div class="col-md-7">
          <div class="left">
            <p>
              انشاء حساب سريع وسهل ومجاني. ستكون قادرًا على إدارة عملياتك الآلية
              ، وتتبع طلباتك ، وكتابة التعليقات ، والمزيد!
            </p>
            <ul>
              <li>تتبع أوامرك</li>
              <li>إدارة الأتمتة</li>
              <li>عرض تاريخ طلبك</li>
              <li>معدل ومراجعة المنتجات</li>
              <li>احصل على عروض وخصومات حصرية والمزيد!</li>
            </ul>
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
      item: {},
    };
  },
};
</script>
