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

                            <div class="entry-content-myaccount address">
                                <h2> {{$t('my_info')}}</h2>
                                <div class="items">
                                    <div class="box address">
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  
                                                </label>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <strong><i class="fas fa-map-marker-alt"></i>  {{$t('address')}}</strong>
                                                    <div class="option">
                                                        <a href="" data-title="تعديل"><img src="@/main/assets/images/edit.svg" alt=""></a>
                                                        <a href="" data-title="حذف"><img src="@/main/assets/images/delete.svg" alt=""></a>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                                    <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                                    <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="box address">
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                  
                                                </label>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <strong><i class="fas fa-map-marker-alt"></i> العنوان</strong>
                                                    <div class="option">
                                                        <a href="" data-title="تعديل"><img src="@/main/assets/images/edit.svg" alt=""></a>
                                                        <a href="" data-title="حذف"><img src="@/main/assets/images/delete.svg" alt=""></a>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                                    <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                                    <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <a href="" class="button"><img src="@/main/assets/images/pin-add.svg" alt="">  {{$t('add_site_new')}}</a>
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
