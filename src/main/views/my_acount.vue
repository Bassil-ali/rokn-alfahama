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

                            <div class="entry-content-myaccount form">
                                <h2>{{$t('personal_information')}}</h2>

                                <form action="">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" class="form-control" placeholder="$t('full_name')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                <input type="text" class="form-control" placeholder="$t('enter_username')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                                <input type="text" class="form-control" placeholder="$t('mobile_no')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                <input type="email" class="form-control" placeholder="$t('email')">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="button">{{$t('update')}}</button>
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
