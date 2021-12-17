<template>
  <div class="entry-content contact">
    <div class="head">
      <h2>{{$t('contact')}}</h2>
    </div>
    <div class="Csection-01">
      <div class="container position-relative">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="content text-center">
              <form action="">
                <h4>{{$t('do_you_have_question')}}</h4>
                <h2>{{$t('contact')}}</h2>
                <div class="mb-3">
                  <input type="text" class="form-control" :placeholder="$t('name')" />
                </div>
                <div class="mb-3">
                  <input
                    type="email"
                    class="form-control"
                    :placeholder="$t('email')"
                  />
                </div>
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    :placeholder="$t('subject')"
                  />
                </div>
                <div class="mb-3">
                  <textarea
                    name=""
                    id=""
                    cols="30"
                    rows="10"
                    class="form-control"
                    :placeholder="$t('message')"
                  ></textarea>
                </div>
                <button type="submit" class="button">{{$t('send_message')}}</button>
              </form>
            </div>
          </div>
          <div class="col-md-6 position-relative">
            <div class="information">
              <ul>
                <li><i class="fas fa-phone"></i> 1234567890</li>
                <li><i class="fas fa-mobile-alt"></i> 1234567890</li>
                <li><i class="far fa-envelope"></i> Runalfakhamah@gmail.com</li>
                <li>
                  <i class="fas fa-map-marker-alt"></i> المملكة العربية السعودية
                </li>
              </ul>
              <div class="socail">
                <span>{{$t('follow_us_on')}}</span>
                <div class="links">
                  <a href=""><i class="fab fa-instagram"></i></a>
                  <a href=""><i class="fab fa-facebook-f"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>
