<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="container">
        <div class="entry-content checkout">
            <h2>إتمام عملية الشراء</h2>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row m-0">
                        <div class="col-md-6 p-0">
                            <div class="block right">
                                <div>
                                    <div class="text-center">
                                        <figure><img src="assets/images/sucess.svg" alt=""></figure>
                                        <h5>تهانينا</h5>
                                        <p>لقد تم الطلب بنجاح</p>
                                        <p>رقم الطلب : 015054087087</p>
                                    </div>
                                    <h4>معلومات التواصل</h4>
                                    <ul>
                                        <li><i class="far fa-user-circle"></i> Salah kamal katiib</li>
                                        <li><i class="fas fa-mobile-alt"></i> 96597687419</li>
                                    </ul>
                                    <h4>معلومات التواصل</h4>
                                    <ul>
                                        <li><i class="fas fa-map-marker-alt"></i> السعودية - المدينة المنورة - شارع
                                            الملك عبد الله</li>
                                        <li>السعودية - المدينة المنورة - شارع الملك عبد الله</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-0">
                            <div class="block left">
                                <h4>معلومات الطلب</h4>
                                <div class="orders">
                                    <div class="order-item">
                                        <div class="d-flex">
                                            <a href="" class="del"><img src="assets/images/del.svg" alt=""></a>
                                            <figure><img src="assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg"
                                                    alt=""></figure>
                                            <div class="caption">
                                                <h2>مصحف اسلامي ذهبي من الطراز الفاخر</h2>
                                                <div class="d-flex justify-content-between">
                                                    <div class="price">1300 ر.س</div>
                                                    <div class="quantity">
                                                        العدد : <strong>3</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-item">
                                        <div class="d-flex">
                                            <a href="" class="del"><img src="assets/images/del.svg" alt=""></a>
                                            <figure><img src="assets/images/54c5989ec7bc8b192c60f9e9a0dae937.jpg"
                                                    alt=""></figure>
                                            <div class="caption">
                                                <h2>مصحف اسلامي ذهبي من الطراز الفاخر</h2>
                                                <div class="d-flex justify-content-between">
                                                    <div class="price">1300 ر.س</div>
                                                    <div class="quantity">
                                                        العدد : <strong>3</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <ul>
                                        <li>عدد المنتجات <span>2</span></li>
                                        <li>المجموع <span>1300 ر.س</span></li>
                                        <li>الخصم <span>100 ر.س</span></li>
                                        <li>سعر التوصيل <span>35 ر.س</span></li>
                                        <li class="toot">المجموع الكلي <span>1250 ر.س</span></li>
                                    </ul>
                                </div>
                                <div class="footer">
                                    <ul>
                                        <li>رقم العملية <span>462758964660-8059078</span></li>
                                        <li>رقم الطلب <span>462758964660-8059078</span></li>
                                        <li>معرف الطلب <span>462758964660-8059078</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 mb-5 text-center">
                <a href="" class="button fill">
                    متابعة التسوق
                </a>
            </div>
        </div>
    </div>

   
    <script>
        const toggle = document.getElementById('toggle');
        const myNavbar = document.getElementById('primary-menu');

        document.onclick = function(e) {
            if (e.target.id !== 'toggle' && e.target.id !== 'primary-menu') {
                toggle.classList.remove('active');
                myNavbar.classList.remove('active')
            }
        }

        toggle.onclick = function() {
            toggle.classList.toggle('active');
            myNavbar.classList.toggle('active')
        }
    </script>

    <script>
        function show_ul(elm) {
            var elm = document.getElementById(elm);
            elm.classList.toggle('active');
        }
    </script>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/app.js"></script>

</body>

</html>