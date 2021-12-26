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

                            <div class="entry-content-myaccount address form">
                                <h2>{{$t('Add_a_new_site')}}</h2>
                                <form @submit.prevent="$root.save(item, 'user.address', '/address')">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label>{{$t('address_name')}} <span>*</span></label>
                                                <input type="text" v-model="item.title_name" class="form-control" :placeholder="$t('address_name_add')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('site')}} <span>*</span></label>
                                                <input type="text" v-model="item.area" class="form-control" :placeholder="$t('site_add')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('widget')}} <span>*</span></label>
                                                <input type="text" v-model="item.widget" class="form-control" :placeholder="$t('widget_add')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('street')}} <span>*</span></label>
                                                <input type="text" v-model="item.street" class="form-control" :placeholder="$t('street_add')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('Avenue')}}</label>
                                                <input type="text" v-model="item.avenue" class="form-control" :placeholder="$t('Avenue_add')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('house_number')}} <span>*</span></label>
                                                <input type="text" v-model="item.house_number" class="form-control" :placeholder="$t('house_number_add')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('Floor_No')}}</label>
                                                <input type="text" v-model="item.floor_no" class="form-control" :placeholder="$t('Floor_No_add')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('Apartment_number')}}</label>
                                                <input type="text" v-model="item.apartment_number" class="form-control" :placeholder="$t('Apartment_number_add')">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label>{{$t('Notes')}}</label>
                                                <input type="text" v-model="item.notes" class="form-control" :placeholder="$t('Notes_add')">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="button">{{$t('add_site')}}</button>
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
    data() {
        return {
            item: {},
        }
    },
}
</script>
