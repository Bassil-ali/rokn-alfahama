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

                            <div class="entry-content-myaccount address form">
                                <h2>اضافة موقع جديدة</h2>
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label>اسم العنوان <span>*</span></label>
                                                <input type="text" class="form-control" placeholder="اضافة اسم العنوان">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>المنطقة <span>*</span></label>
                                                <input type="text" class="form-control" placeholder="اضافة اسم المنطقة">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>القطعة <span>*</span></label>
                                                <input type="text" class="form-control" placeholder="اضافة اسم القطعة">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>الشارع <span>*</span></label>
                                                <input type="text" class="form-control" placeholder="اضافة اسم الشارع">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>جادة</label>
                                                <input type="text" class="form-control" placeholder="اضافة اسم الجادة">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>رقم المنزل <span>*</span></label>
                                                <input type="text" class="form-control" placeholder="اضافة رقم المنزل">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>رقم الطابق</label>
                                                <input type="text" class="form-control" placeholder="اضافة رقم الطابق">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>رقم الشقة</label>
                                                <input type="text" class="form-control" placeholder="اضافة رقم الشقة">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>ملاحظات</label>
                                                <input type="text" class="form-control" placeholder="اضافة الملاحظات">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="button">اضافة الموقع</button>
                                </form>
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
