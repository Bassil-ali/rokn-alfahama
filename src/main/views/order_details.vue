<template>
      <div class="entry-content">
        <nav aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">{{$t('My_Account')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$t('my_info')}}</li>
                </ol>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="menu-user">
                         <li><a href=""><span><img src="@/main/assets/images/user-icon.svg" alt=""></span> {{$t('my_info')}}</a></li>
                        <li><a href=""><span><img src="@/main/assets/images/history.svg" alt=""></span> {{$t('The_date_of_order')}}</a></li>
                        <li><a href=""><span><img src="@/main/assets/images/address.svg" alt=""></span> {{$t('my_addresses')}}</a></li>
                        <li><a href=""><span><img src="@/main/assets/images/006-close-envelope.svg" alt=""></span> {{$t('change_Password')}}</a></li>
                        <li><a href=""><span><img src="@/main/assets/images/logout.svg" alt=""></span> {{$t('sign_out')}}</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <div class="entry-content-myaccount order-details">
                                <h2>{{$t('Order_history')}}</h2>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{$t('photo')}}</th>
                                            <th scope="col">{{$t('name')}}</th>
                                            <th scope="col">{{$t('quantity')}}</th>
                                            <th scope="col">{{$t('total_summation')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <figure class="mb-0"><img src="@/main/assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg" alt=""></figure>
                                            </td>
                                            <td data-title="الاسم ">مصحف اسلامي ذهبي من الطراز الفاخر</td>
                                            <td data-title="الكمية ">2</td>
                                            <td data-title="السعر ">1300 ر.س</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <figure class="mb-0"><img src="@/main/assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg" alt=""></figure>
                                            </td>
                                            <td data-title="الاسم ">مصحف اسلامي ذهبي من الطراز الفاخر</td>
                                            <td data-title="الكمية ">2</td>
                                            <td data-title="السعر ">1300 ر.س</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h2>{{$t('Shipping_place')}}</h2>
                                <div class="box address">
                                    <strong><i class="fas fa-map-marker-alt"></i> {{$t('address')}}</strong>
                                    <ul>
                                        <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                        <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                        <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                    </ul>
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
