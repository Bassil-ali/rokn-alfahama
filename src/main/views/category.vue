<template>
      <div class="entry-content category">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="siadbar">
                        <div class="box">
                            <h2><i class="bi bi-list"></i>{{$t('Categories')}}</h2>
                            <ul class="category">
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <span class="title">
                                        <figure><img src="@/main/assets/images/cat01.svg" alt=""></figure> عطور شرقية
                                    </span>
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <span class="title">
                                        <figure><img src="@/main/assets/images/cat02.svg" alt=""></figure> زيوت عصرية فاخرة
                                    </span>
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <span class="title">
                                        <figure><img src="@/main/assets/images/cat03.svg" alt=""></figure> بخور ومباخر عربية
                                    </span>
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <span class="title">
                                        <figure><img src="@/main/assets/images/cat04.svg" alt=""></figure> مستلزمات نسائية
                                    </span>
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <span class="title">
                                        <figure><img src="@/main/assets/images/cat05.svg" alt=""></figure> أزياء عربية للجنسين
                                    </span>
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <span class="title">
                                        <figure><img src="@/main/assets/images/cat06.svg" alt=""></figure> أحذية عربية وفضيات
                                    </span>
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex justify-content-between">
                                        <span class="title">
                                        <figure><img src="@/main/assets/images/cat07.svg" alt=""></figure> عسل
                                    </span>
                                        <i class="bi bi-chevron-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="box">
                            <h2>{{$t('filter')}}</h2>
                            <div>
                                <div class="min-max-slider" data-legendnum="2">
                                    <span class="model">{{$t('the_average')}}</span>
                                    <label for="min">{{$t('Minimum_price')}}</label>
                                    <input id="min" class="min" name="min" type="range" step="1" min="0" max="3000" />
                                    <label for="max"> {{$t('Maximum_price')}}</label>
                                    <input id="max" class="max" name="max" type="range" step="1" min="0" max="3000" />
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <h2>{{$t('Reviews')}}</h2>
                            <div>
                                <div class="rating">
                                    <label id="star"><i class="bi bi-star-fill"></i>
                                      <input type="radio" name="starValue" value="5" />
                                    </label>
                                    <label id="star"><i class="bi bi-star-fill"></i>
                                      <input type="radio" name="starValue" value="4" />
                                    </label>
                                    <label id="star"><i class="bi bi-star-fill"></i>
                                      <input type="radio" name="starValue" value="3" />
                                    </label>
                                    <label id="star"><i class="bi bi-star-fill"></i>
                                      <input type="radio" name="starValue" value="2" />
                                    </label>
                                    <label id="star"><i class="bi bi-star-fill"></i>
                                      <input type="radio" name="starValue" value="1" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="head-block">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="right-block">
                                <div class="d-flex align-items-center">
                                    <h2>عطور شرقية</h2>
                                    <span>86 عنصر متوفر</span>
                                </div>
                            </div>
                            <div class="left-block">
                                <div class="d-flex">
                                    <ul class="select-form" id="show1" onclick="show_ul('show1')">
                                        <li>50</li>
                                        <ul>
                                            <li><a href="">30</a></li>
                                            <li><a href="">30</a></li>
                                            <li><a href="">30</a></li>
                                            <li><a href="">30</a></li>
                                        </ul>
                                    </ul>
                                    <ul class="select-form" id="show2" onclick="show_ul('show2')">
                                        <li>الاكثر تصنيفاً</li>
                                        <ul>
                                            <li><a href="">الاحدث</a></li>
                                            <li><a href="">الاحدث</a></li>
                                            <li><a href="">الاحدث</a></li>
                                            <li><a href="">الاحدث</a></li>
                                            <li><a href="">الاحدث</a></li>
                                        </ul>
                                    </ul>
                                    <div class="option-show">
                                        <div class="d-flex align-items-center">
                                            <a href="" id="col"><img src="@/main/assets/images/col.svg" alt=""></a>
                                            <a href="" id="grid"><img src="@/main/assets/images/grid.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/5cbd19671e766acf3c6a76cf14cb4415.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price">300 ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/969737a0d391924f27ef42ddce770fe7.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/e2b4fd5b11b08afbef622253193402b7.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/5cbd19671e766acf3c6a76cf14cb4415.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price">300 ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/969737a0d391924f27ef42ddce770fe7.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/e2b4fd5b11b08afbef622253193402b7.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/5cbd19671e766acf3c6a76cf14cb4415.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price">300 ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/969737a0d391924f27ef42ddce770fe7.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/e2b4fd5b11b08afbef622253193402b7.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/5cbd19671e766acf3c6a76cf14cb4415.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price">300 ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/969737a0d391924f27ef42ddce770fe7.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/d803777492c0fe71db41dcceff187467.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="item mb-3">
                                    <figure>
                                        <a href=""><img src="@/main/assets/images/e2b4fd5b11b08afbef622253193402b7.jpg" alt=""></a>
                                    </figure>
                                    <div class="caption">
                                        <a href="" class="title">مصحف اسلامي ذهبي من الطراز الفاخر</a>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <p class="price"><span>300</span> ريال</p>
                                            <p class="star">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-2 justify-content-between align-items-center">
                                            <a href="" class="addToCart button"><img src="@/main/assets/images/shopping-cart-2.svg" alt=""> اضف إلى السلة</a>
                                            <a href="" class="addToFavorite button"><img src="@/main/assets/images/hearts.svg" alt=""></a>
                                        </div>
                                    </div>
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
