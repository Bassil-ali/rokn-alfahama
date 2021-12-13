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

                            <div class="entry-content-myaccount form address">
                                <h2>معلومات شخصية</h2>

                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label>كلمة المرور القديمة</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                        <input type="password" class="form-control" placeholder="ادخل كلمة المرور القديمة">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>كلمة المرور الجديدة</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                        <input type="password" class="form-control" placeholder="ادخل كلمة المرور الجديدة">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>تأكيد كلمة المرور الجديدة</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                        <input type="password" class="form-control" placeholder="ادخل تأكيد كلمة المرور الجديدة">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="button">تأكيد التغيير</button>
                                        </form>
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
