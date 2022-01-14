<template>
     <div class="container">
        <div class="entry-content checkout">
            <h2 :label="$t('thanks_error_tile')"></h2>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row m-0">
                        <div class="col-md-6 p-0">
                            <div class="block right">
                                <div>
                                    <div class="text-center">
                                        <figure><img src="@/main/assets/images/false.svg" alt=""></figure>
                                        <h5>{{$t('We_apologize')}}</h5>
                                        <p>{{$t('not_complete')}}</p>
                                        <p>{{$t('try')}}</p>
                                    </div>
                                    <h4>{{$t('Contact_info')}}</h4>
                                    <ul>
                                        <li><i class="far fa-user-circle"></i> Salah kamal katiib</li>
                                        <li><i class="fas fa-mobile-alt"></i> 96597687419</li>
                                    </ul>
                                    <h4>{{$t('Contact_info')}}</h4>
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i> السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                        <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-0">
                            <div class="block left">
                                <h4>{{$t('Order_information')}}</h4>
                                <div class="orders">
                                    <div class="order-item">
                                        <div class="d-flex">
                                            <a href="" class="del"><img src="@/main/assets/images/del.svg" alt=""></a>
                                            <figure><img src="@/main/assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg" alt=""></figure>
                                            <div class="caption">
                                                <h2>مصحف اسلامي ذهبي من الطراز الفاخر</h2>
                                                <div class="d-flex justify-content-between">
                                                    <div class="price">1300 $</div>
                                                    <div class="quantity">
                                                         {{$t('quantity')}}  : <strong>3</strong>
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
                                                    <div class="price">1300 $</div>
                                                    <div class="quantity">
                                                         {{$t('quantity')}}  : <strong>3</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                   <ul>
                                        <li>{{$t('number_of_products')}} <span>2</span></li>
                                        <li>{{$t('Total')}}} <span>1300 $</span></li>
                                        <li>{{$t('quantity')}}} <span>100 $</span></li>
                                        <li>{{$t('Discount')}}}  <span>35 $</span></li>
                                        <li class="toot"> {{$t('total_summation')}}} <span>1250 $</span></li>
                                    </ul>
                                </div>
                                <div class="footer">
                                    <ul>
                                        <li> {{$t('operation_number')}}<span>462758964660-8059078</span></li>
                                        <li>{{$t('order_number')}}} <span>462758964660-8059078</span></li>
                                        <li>{{$t('Order_ID')}}} <span>462758964660-8059078</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 mb-5 text-center">
                <a href="" class="button fill me-3">
                    {{$t('try_again')}}
                </a>
                <a href="" class="button fill no">
                    {{$t('exit')}}
                </a>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
