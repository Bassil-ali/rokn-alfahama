<template>
  <div class="col-md-10">
    <div class="entry-content-myaccount form address">
      <h2>معلومات شخصية</h2>

      <div class="row justify-content-center">
        <div class="col-md-10">
          <form action="">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label>كلمة المرور القديمة</label>
                <div class="input-group">
                  <span class="input-group-text"
                    ><i class="fas fa-key"></i
                  ></span>
                  <input
                    type="password"
                    class="form-control"
                    placeholder="ادخل كلمة المرور القديمة"
                  />
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label>كلمة المرور الجديدة</label>
                <div class="input-group">
                  <span class="input-group-text"
                    ><i class="fas fa-lock"></i
                  ></span>
                  <input
                    type="password"
                    class="form-control"
                    placeholder="ادخل كلمة المرور الجديدة"
                  />
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label>تأكيد كلمة المرور الجديدة</label>
                <div class="input-group">
                  <span class="input-group-text"
                    ><i class="fas fa-lock"></i
                  ></span>
                  <input
                    type="password"
                    class="form-control"
                    placeholder="ادخل تأكيد كلمة المرور الجديدة"
                  />
                </div>
              </div>
            </div>
            <button type="submit" class="button">تأكيد التغيير</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>