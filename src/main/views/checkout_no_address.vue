<template>
     <div class="container">
        <div class="entry-content checkout">
            <h2>{{$t('Checkout')}}</h2>

            <div class="row">
                <div class="col-md-4">
                    <div class="block">
                        <h4>{{$t('Order_information')}}</h4>
                        <div class="orders">
                            <div class="order-item">
                                <div class="d-flex">
                                    <a href="" class="del"><img src="@/main/assets/images/del.svg" alt=""></a>
                                    <figure><img src="@/main/assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg" alt=""></figure>
                                    <div class="caption">
                                        <h2>مصحف اسلامي ذهبي من الطراز الفاخر</h2>
                                        <div class="d-flex justify-content-between">
                                            <div class="price">1300 ر.س</div>
                                            <div class="quantity d-flex align-items-center">
                                                <div id="quantity" class="d-flex align-items-center">
                                                    <button class="btn-subtract" type="button">-</button>
                                                    <input type="number" class="item-quantity" min="0" value="1">
                                                    <button class="btn-add" type="button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-item">
                                <div class="d-flex">
                                    <a href="" class="del"><img src="@/main/assets/images/del.svg" alt=""></a>
                                    <figure><img src="@/main/assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg" alt=""></figure>
                                    <div class="caption">
                                        <h2>مصحف اسلامي ذهبي من الطراز الفاخر</h2>
                                        <div class="d-flex justify-content-between">
                                            <div class="price">1300 ر.س</div>
                                            <div class="quantity d-flex align-items-center">
                                                <div id="quantity" class="d-flex align-items-center">
                                                    <button class="btn-subtract" type="button">-</button>
                                                    <input type="number" class="item-quantity" min="0" value="1">
                                                    <button class="btn-add" type="button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="" class="copon">
                            <input type="text" :placeholder="$t('Enter_the_coupon_code')">
                            <button>{{$t('Activate_the_coupon')}}</button>
                        </form>
                        <div class="footer">
                            <ul>
                                <li>{{$t('number_of_products')}} <span>2</span></li>
                                <li>{{$t('Total')}}} <span>1300 ر.س</span></li>
                                <li>{{$t('Discount')}} <span>100 ر.س</span></li>
                                <li>{{$t('Delivery_price')}} <span>35 ر.س</span></li>
                                <li class="toot">{{$t('total_summation')}} <span>1250 ر.س</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="block">
                        <h4>{{$t('Delivery_details')}}</h4>
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <div class="content">
                                    <p>{{$t('not_registered')}}} <a href="">{{$t('yes')}}</a> <a href="">{{$t('guest')}}</a></p>
                                    <div class="box">
                                        <div class="entry-content-myaccount address">
                                           <h2>{{$t('Add_a_new_site')}}</h2>
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label>{{$t('address_name')}} <span>*</span></label>
                                                <input type="text" class="form-control" :placeholder="$t('address_name_add')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('site')}} <span>*</span></label>
                                                <input type="text" class="form-control" :placeholder="$t('site_add')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('widget')}} <span>*</span></label>
                                                <input type="text" class="form-control" :placeholder="$t('widget_add')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('street')}} <span>*</span></label>
                                                <input type="text" class="form-control" :placeholder="$t('street_add')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('Avenue')}}</label>
                                                <input type="text" class="form-control" :placeholder="$t('Avenue_add')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('house_number')}} <span>*</span></label>
                                                <input type="text" class="form-control" :placeholder="$t('house_number_add')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('Floor_No')}}</label>
                                                <input type="text" class="form-control" :placeholder="$t('Floor_No_add')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('Apartment_number')}}</label>
                                                <input type="text" class="form-control" :placeholder="$t('Apartment_number_add')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('Notes')}}</label>
                                                <input type="text" class="form-control" :placeholder="$t('Notes_add')">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="button">{{$t('add_site')}}</button>
                                </form>

                                        </div>
                                        <div class="pay-box form">
                                            <h6>{{$t('Choose_payment_method')}}</h6>
                                            <form action="">
                                                <div class="d-flex">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                        <label class="form-check-label" for="inlineRadio1">كي نت <img src="@/main/assets/images/magento2-knet-payment-gateway.jpg" alt=""></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <label class="form-check-label" for="inlineRadio2">مستر كود وفيزا <img src="@/main/assets/images/visa.jpg" alt=""></label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                        <label class="form-check-label" for="inlineRadio3">كاش <img src="@/main/assets/images/wallet.jpg" alt=""></label>
                                                    </div>
                                                </div>
                                                <button class="button">{{$t('Complete_the_order')}}</button>
                                            </form>
                                            <p>{{$t('agree_condision')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center infoo">
                <div class="col-md-10 text-center">
                    <p>{{$t('pyment_safe')}}</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
