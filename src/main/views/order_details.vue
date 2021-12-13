<template>
      <div class="entry-content">
        <nav aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">حسابي</a></li>
                    <li class="breadcrumb-item active" aria-current="page">معلوماتي</li>
                </ol>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="menu-user">
                        <li><a href=""><span><img src="@/main/assets/images/user-icon.svg" alt=""></span> معلوماتي</a></li>
                        <li><a href=""><span><img src="@/main/assets/images/history.svg" alt=""></span> تاريخ الطلب</a></li>
                        <li><a href=""><span><img src="@/main/assets/images/address.svg" alt=""></span> عناويني</a></li>
                        <li><a href=""><span><img src="@/main/assets/images/006-close-envelope.svg" alt=""></span> تغير كلمة المرور</a></li>
                        <li><a href=""><span><img src="@/main/assets/images/logout.svg" alt=""></span> تسجيل الخروج</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <div class="entry-content-myaccount order-details">
                                <h2>تاريخ الطلبات</h2>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">الصورة</th>
                                            <th scope="col">الاسم</th>
                                            <th scope="col">الكمية</th>
                                            <th scope="col">السعر الاجمالي</th>
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
                                <h2>مكان الشحن</h2>
                                <div class="box address">
                                    <strong><i class="fas fa-map-marker-alt"></i> العنوان</strong>
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
