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

                            <div class="entry-content-myaccount date-order">
                                <h2>تاريخ الطلبات</h2>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">رقم الطلب</th>
                                            <th scope="col">تاريخ الطلب</th>
                                            <th scope="col">الحالة</th>
                                            <th scope="col">السعر الاجمالي</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td data-title="رقم الطلب ">1234</td>
                                            <td data-title="تاريخ الطلب ">10.01.2023</td>
                                            <td data-title="الحالة ">مدفوع</td>
                                            <td data-title="السعر الإجمالي ">1300 ر.س</td>
                                            <td><a href="" class="button">تفاصيل</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td data-title="رقم الطلب ">1234</td>
                                            <td data-title="تاريخ الطلب ">10.01.2023</td>
                                            <td data-title="الحالة ">مدفوع</td>
                                            <td data-title="السعر الإجمالي ">1300 ر.س</td>
                                            <td><a href="" class="button">تفاصيل</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td data-title="رقم الطلب ">1234</td>
                                            <td data-title="تاريخ الطلب ">10.01.2023</td>
                                            <td data-title="الحالة ">مدفوع</td>
                                            <td data-title="السعر الإجمالي ">1300 ر.س</td>
                                            <td><a href="" class="button">تفاصيل</a></td>
                                        </tr>
                                    </tbody>
                                </table>
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
