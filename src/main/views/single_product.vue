<template>
    <div class="entry-content single-product">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">التصنيفات</a></li>
                    <li class="breadcrumb-item"><a href="#">عطور شرقية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">عطر مسك سلك</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-9 right">
                    <div class="caption-product">
                        <div class="row">
                            <div class="col-md-5">
                                <div id="sync1" class="owl-carousel" dir="ltr">
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                </div>

                                <div id="sync2" class="owl-carousel" dir="ltr">
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                    <div class="item">
                                        <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="desc">
                                    <h2>لمسات فاخرة و رومانسية من نفات عطر مسك سلك أجمل المفضل ذو الرائحة الثابته</h2>
                                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
                                    <div class="price">
                                        <strong>300</strong> <span>ريال سعودي</span>
                                    </div>
                                    <div class="quantity d-flex align-items-center">
                                        <span>{{$t('quantity')}}</span>
                                        <div id="quantity" class="d-flex align-items-center">
                                            <button class="btn-subtract" type="button">-</button>
                                            <input type="number" class="item-quantity" min="0" value="1">
                                            <button class="btn-add" type="button">+</button>
                                        </div>
                                    </div>
                                    <div class="buttons d-flex justify-content-between align-items-center">
                                        <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> {{$t('add_to_cart')}}</a>
                                        <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 left">
                    <div class="section-01">
                        <div class="item mb-5 text-center">
                            <figure><img src="@/main/assets/images/discount.svg" alt=""></figure>
                            <h3>{{$t('permanent_offers')}}</h3>
                            <p>{{$t('discount_offer')}}</p>
                        </div>
                        <div class="item mb-5 text-center">
                            <figure><img src="@/main/assets/images/shipped.svg" alt=""></figure>
                            <h3>{{$t('free_delivery')}}</h3>
                            <p>{{$t('Free_delivery_if')}}</p>
                        </div>
                        <div class="item mb-3 text-center">
                            <figure><img src="@/main/assets/images/headphones.svg" alt=""></figure>
                            <h3>{{$t('help')}}</h3>
                            <p>{{$t('Customer_service')}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="box">
                            <h2>{{$t('Similar_Products')}}</h2>
                            <div class="product-list">
                                <div class="item">
                                    <div class="d-flex">
                                        <a href="">
                                            <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                        </a>
                                        <div class="caption">
                                            <a href=""> عطر مسك سلك </a>
                                            <div class="d-flex justify-content-between">
                                                <div class="price"><strong>300</strong> ر.س</div>
                                                <a href="" class="button addToCart"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف للسلة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="d-flex">
                                        <a href="">
                                            <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                        </a>
                                        <div class="caption">
                                            <a href=""> عطر مسك سلك </a>
                                            <div class="d-flex justify-content-between">
                                                <div class="price"><strong>300</strong> ر.س</div>
                                                <a href="" class="button addToCart"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف للسلة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="d-flex">
                                        <a href="">
                                            <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                        </a>
                                        <div class="caption">
                                            <a href=""> عطر مسك سلك </a>
                                            <div class="d-flex justify-content-between">
                                                <div class="price"><strong>300</strong> ر.س</div>
                                                <a href="" class="button addToCart"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف للسلة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="d-flex">
                                        <a href="">
                                            <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                        </a>
                                        <div class="caption">
                                            <a href=""> عطر مسك سلك </a>
                                            <div class="d-flex justify-content-between">
                                                <div class="price"><strong>300</strong> ر.س</div>
                                                <a href="" class="button addToCart"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف للسلة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="d-flex">
                                        <a href="">
                                            <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                        </a>
                                        <div class="caption">
                                            <a href=""> عطر مسك سلك </a>
                                            <div class="d-flex justify-content-between">
                                                <div class="price"><strong>300</strong> ر.س</div>
                                                <a href="" class="button addToCart"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف للسلة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="d-flex">
                                        <a href="">
                                            <figure><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></figure>
                                        </a>
                                        <div class="caption">
                                            <a href=""> عطر مسك سلك </a>
                                            <div class="d-flex justify-content-between">
                                                <div class="price"><strong>300</strong> ر.س</div>
                                                <a href="" class="button addToCart"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف للسلة</a>
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
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">{{$t('Product_Description')}}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">{{$t('Properties')}}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">{{$t('Reviews')}}</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="content">
                                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                                        لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل
                                        و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                                        و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
                                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                                        لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل
                                        و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                                        و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
                                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                                        لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل
                                        و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                                        و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="content">
                                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                                        لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل
                                        و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                                        و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
                                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                                        لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل
                                        و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                                        و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
                                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                                        لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل
                                        و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                                        و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="content">
                                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                                        لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل
                                        و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                                        و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
                                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                                        لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل
                                        و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                                        و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
                                    <p>هذا نص تجريبي لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي
                                        لاختبار شكل و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل
                                        و حجم النصوص و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .هذا نص تجريبي لاختبار شكل و حجم النصوص
                                        و طريقة عرضهاi في هذا المكان و حجم و لون الخط حيث يتم التحكم في هذا النص وامكانية تغييرة في اي وقت عن طريق ادارة الموقع . يتم اضافة هذا النص كنص تجريبي للمعاينة .</p>
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
export default {
    
}
</script>
