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

                            <div class="entry-content-myaccount form address">
                                <h2>{{$t('personal_information')}}</h2>

                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label>{{$t('old_pass')}}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                        <input type="password" class="form-control" :placeholder="$t('add_old_pass')">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>{{$t('new_pass')}}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                        <input type="password" class="form-control" :placeholder="$t('add_new_pass')">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>{{$t('confirm_pass')}}</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                        <input type="password" class="form-control" :placeholder="$t('add_confirm_pass')">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="button">{{$t('Confirm_the_change')}}</button>
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
