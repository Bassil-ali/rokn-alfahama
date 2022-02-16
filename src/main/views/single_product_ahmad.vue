<template>
  <div class="entry-content single-product">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#"><i class="bi bi-house-door"></i></a>
          </li>
          <li class="breadcrumb-item"><a href="#">التصنيفات</a></li>
          <li class="breadcrumb-item"><a href="#">عطور شرقية</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            عطر مسك سلك
          </li>
        </ol>
      </nav>
      <div class="row">
        <div class="col-md-9 right">
          <div class="caption-product">
            <div class="row">
              <div class="col-md-5">
                <div id="sync1">
                  <div class="item-image active-zome" id="iamge1">
                    <figure class="item">
                      <img
                        src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                        alt=""
                      />
                    </figure>
                  </div>
                  <div class="item-image" id="iamge2">
                    <figure class="item">
                      <img
                        src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                        alt=""
                      />
                    </figure>
                  </div>
                  <div class="item-image" id="iamge3">
                    <figure class="item">
                      <img
                        src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                        alt=""
                      />
                    </figure>
                  </div>
                </div>

                <div id="sync2">
                  <div
                    class="item border-i active-border"
                    onclick="show('iamge1',this)"
                  >
                    <figure>
                      <img
                        src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                        alt=""
                      />
                    </figure>
                  </div>
                  <div class="item border-i" onclick="show('iamge2',this)">
                    <figure>
                      <img
                        src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                        alt=""
                      />
                    </figure>
                  </div>
                  <div class="item border-i" onclick="show('iamge3',this)">
                    <figure>
                      <img
                        src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                        alt=""
                      />
                    </figure>
                  </div>
                </div>
                <!-- <script>
                  function show(elm, elm2) {
                    var item_image = document.querySelectorAll(".item-image");
                    var border = document.querySelectorAll(".border-i");
                    var elm = document.getElementById(elm);
                    item_image.forEach((element) => {
                      element.classList.remove("active-zome");
                    });
                    border.forEach((element) => {
                      element.classList.remove("active-border");
                    });
                    elm.classList.add("active-zome");
                    elm2.classList.add("active-border");
                  }
                </script> -->
              </div>
              <div class="col-md-7">
                <div class="desc">
                  <h2>
                    لمسات فاخرة و رومانسية من نفات عطر مسك سلك أجمل المفضل ذو
                    الرائحة الثابته
                  </h2>
                  <p>
                    هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا
                    المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية
                    تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص
                    كنص تجريبي للمعاينة .
                  </p>
                  <div class="price">
                    <strong>300</strong> <span>ريال سعودي</span>
                  </div>
                  <form action="">
                    <div class="quantity d-flex align-items-center mb-3">
                      <span>الكمية</span>
                      <div id="quantity" class="d-flex align-items-center">
                        <button class="btn-subtract" type="button">-</button>
                        <input
                          type="number"
                          class="item-quantity"
                          min="0"
                          value="1"
                        />
                        <button class="btn-add" type="button">+</button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="" class="form-label">الحجم</label>
                              <select class="form-select" name="" id="">
                                <option value="" disabled selected>اختر</option>
                                <option value="">XL</option>
                                <option value="">XL</option>
                                <option value="">XL</option>
                                <option value="">XL</option>
                                <option value="">XL</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="" class="form-label">اللون</label>
                              <select class="form-select" name="" id="">
                                <option value="" disabled selected>اختر</option>
                                <option value="">الأحمر</option>
                                <option value="">الأبيض</option>
                                <option value="">الأسود</option>
                                <option value="">الأخضر</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div
                      class="
                        buttons
                        d-flex
                        justify-content-between
                        align-items-center
                      "
                    >
                      <a href="" class="addToCart button"
                        ><img src="assets/images/shopping-cart-2.svg" alt="" />
                        اضف إلى السلة</a
                      >
                      <a href="" class="addToFavorite button"
                        ><img src="assets/images/hearts.svg" alt=""
                      /></a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 left">
          <div class="section-01">
            <div class="item mb-5 text-center">
              <figure><img src="assets/images/discount.svg" alt="" /></figure>
              <h3>عروض دائمة</h3>
              <p>تخفيضات وعروض بشكل مستمر على اغلب المنتجات</p>
            </div>
            <div class="item mb-5 text-center">
              <figure><img src="assets/images/shipped.svg" alt="" /></figure>
              <h3>توصيل مجاني</h3>
              <p>التوصيل مجاني اذا كانت قيمة الطلب اكثر من 300$</p>
            </div>
            <div class="item mb-3 text-center">
              <figure><img src="assets/images/headphones.svg" alt="" /></figure>
              <h3>المساعدة</h3>
              <p>خدمة ومتابعة العملاء</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="sidebar">
            <div class="box">
              <h2>منتجات متشابهة</h2>
              <div class="product-list">
                <div class="item">
                  <div class="d-flex">
                    <a href="">
                      <figure>
                        <img
                          src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                          alt=""
                        />
                      </figure>
                    </a>
                    <div class="caption">
                      <a href=""> عطر مسك سلك </a>
                      <div class="d-flex justify-content-between">
                        <div class="price"><strong>300</strong> ر.س</div>
                        <a href="" class="button addToCart"
                          ><img
                            src="assets/images/shopping-cart-2.svg"
                            alt=""
                          />
                          اضف للسلة</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="d-flex">
                    <a href="">
                      <figure>
                        <img
                          src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                          alt=""
                        />
                      </figure>
                    </a>
                    <div class="caption">
                      <a href=""> عطر مسك سلك </a>
                      <div class="d-flex justify-content-between">
                        <div class="price"><strong>300</strong> ر.س</div>
                        <a href="" class="button addToCart"
                          ><img
                            src="assets/images/shopping-cart-2.svg"
                            alt=""
                          />
                          اضف للسلة</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="d-flex">
                    <a href="">
                      <figure>
                        <img
                          src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                          alt=""
                        />
                      </figure>
                    </a>
                    <div class="caption">
                      <a href=""> عطر مسك سلك </a>
                      <div class="d-flex justify-content-between">
                        <div class="price"><strong>300</strong> ر.س</div>
                        <a href="" class="button addToCart"
                          ><img
                            src="assets/images/shopping-cart-2.svg"
                            alt=""
                          />
                          اضف للسلة</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="d-flex">
                    <a href="">
                      <figure>
                        <img
                          src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                          alt=""
                        />
                      </figure>
                    </a>
                    <div class="caption">
                      <a href=""> عطر مسك سلك </a>
                      <div class="d-flex justify-content-between">
                        <div class="price"><strong>300</strong> ر.س</div>
                        <a href="" class="button addToCart"
                          ><img
                            src="assets/images/shopping-cart-2.svg"
                            alt=""
                          />
                          اضف للسلة</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="d-flex">
                    <a href="">
                      <figure>
                        <img
                          src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                          alt=""
                        />
                      </figure>
                    </a>
                    <div class="caption">
                      <a href=""> عطر مسك سلك </a>
                      <div class="d-flex justify-content-between">
                        <div class="price"><strong>300</strong> ر.س</div>
                        <a href="" class="button addToCart"
                          ><img
                            src="assets/images/shopping-cart-2.svg"
                            alt=""
                          />
                          اضف للسلة</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="d-flex">
                    <a href="">
                      <figure>
                        <img
                          src="assets/images/d803777492c0fe71db41dcceff187467.jpg"
                          alt=""
                        />
                      </figure>
                    </a>
                    <div class="caption">
                      <a href=""> عطر مسك سلك </a>
                      <div class="d-flex justify-content-between">
                        <div class="price"><strong>300</strong> ر.س</div>
                        <a href="" class="button addToCart"
                          ><img
                            src="assets/images/shopping-cart-2.svg"
                            alt=""
                          />
                          اضف للسلة</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="home-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#home"
                  type="button"
                  role="tab"
                  aria-controls="home"
                  aria-selected="true"
                >
                  وصف المنتج
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="profile-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#profile"
                  type="button"
                  role="tab"
                  aria-controls="profile"
                  aria-selected="false"
                >
                  الخصائص
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="contact-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#contact"
                  type="button"
                  role="tab"
                  aria-controls="contact"
                  aria-selected="false"
                >
                  التقييمات
                </button>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="home"
                role="tabpanel"
                aria-labelledby="home-tab"
              >
                <div class="content">
                  <p>
                    هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا
                    المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية
                    تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص
                    كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                    و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم
                    في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع .
                    يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                    لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم
                    و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي
                    وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي
                    للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة
                    عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا
                    النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم
                    اضافة هذا النص كنص تجريبي للمعاينة .
                  </p>
                  <p>
                    هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا
                    المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية
                    تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص
                    كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                    و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم
                    في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع .
                    يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                    لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم
                    و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي
                    وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي
                    للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة
                    عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا
                    النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم
                    اضافة هذا النص كنص تجريبي للمعاينة .
                  </p>
                  <p>
                    هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا
                    المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية
                    تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص
                    كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                    و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم
                    في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع .
                    يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                    لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم
                    و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي
                    وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي
                    للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة
                    عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا
                    النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم
                    اضافة هذا النص كنص تجريبي للمعاينة .
                  </p>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="profile"
                role="tabpanel"
                aria-labelledby="profile-tab"
              >
                <div class="content">
                  <p>
                    هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا
                    المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية
                    تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص
                    كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                    و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم
                    في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع .
                    يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                    لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم
                    و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي
                    وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي
                    للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة
                    عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا
                    النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم
                    اضافة هذا النص كنص تجريبي للمعاينة .
                  </p>
                  <p>
                    هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا
                    المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية
                    تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص
                    كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                    و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم
                    في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع .
                    يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                    لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم
                    و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي
                    وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي
                    للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة
                    عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا
                    النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم
                    اضافة هذا النص كنص تجريبي للمعاينة .
                  </p>
                  <p>
                    هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا
                    المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية
                    تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص
                    كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                    و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم
                    في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع .
                    يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                    لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم
                    و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي
                    وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي
                    للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة
                    عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا
                    النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم
                    اضافة هذا النص كنص تجريبي للمعاينة .
                  </p>
                </div>
              </div>
              <div
                class="tab-pane fade"
                id="contact"
                role="tabpanel"
                aria-labelledby="contact-tab"
              >
                <div class="content">
                  <p>
                    هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا
                    المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية
                    تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص
                    كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                    و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم
                    في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع .
                    يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                    لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم
                    و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي
                    وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي
                    للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة
                    عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا
                    النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم
                    اضافة هذا النص كنص تجريبي للمعاينة .
                  </p>
                  <p>
                    هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا
                    المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية
                    تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص
                    كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                    و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم
                    في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع .
                    يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                    لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم
                    و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي
                    وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي
                    للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة
                    عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا
                    النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم
                    اضافة هذا النص كنص تجريبي للمعاينة .
                  </p>
                  <p>
                    هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا
                    المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية
                    تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص
                    كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                    و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم
                    في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع .
                    يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                    لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم
                    و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي
                    وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي
                    للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة
                    عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا
                    النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم
                    اضافة هذا النص كنص تجريبي للمعاينة .
                  </p>
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
 
</script>
<style>
</style>