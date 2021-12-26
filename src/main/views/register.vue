<template>
  <div class="bg-myacoutn">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="form">
            <h2>{{$t('welcome')}}</h2>
            <p><small>{{$t('create_account')}}</small></p>
            <form @submit.prevent="$root.save(item, 'user', '/')">
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fas fa-user"></i
                ></span>
                <input
                  v-model="item.name"
                  type="text"
                  class="form-control"
                  :placeholder="$t('full_name')"
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
                  :placeholder="$t('enter_username')"/>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text"
                  ><i class="fas fa-mobile-alt"></i
                ></span>
                <input
                  v-model="item.mobile"
                  type="text"
                  class="form-control"
                  :placeholder="$t('mobile_no')"
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
                  :placeholder="$t('email')"
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
                  :placeholder="$t('password')"
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
                    {{$t('agree')}} <a href="">{{$t('Terms_of_use')}}</a>
                  </label>
                </div>
              </div>
              <button type="submit" class="button">{{$t('create_account')}}</button>
            </form>
           <p class="text-center mt-3 mb-0">
              {{$t('account_not')}} <a href=""><strong>{{$t('Create_account')}}</strong></a>
            </p>
          </div>
        </div>
        <div class="col-md-7">
          <div class="left">
          <p>
              {{$t('new_customer_message')}}
            </p>
            <ul>
              <li>{{$t('Track_your_orders')}}</li>
              <li>{{$t('Automation_management')}}</li>
              <li>{{$t('View_your_order_history')}}</li>
              <li>{{$t('Rate_and_review_products')}}</li>
              <li>{{$t('discount_and_more')}}</li>
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
