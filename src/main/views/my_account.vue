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
                    <side-menu />
                </div>
                <div class="col-md-9">
                    <div class="row justify-content-center">
                        <account-info v-if="$route.params.id=='change_info'" />
                        <reset-password v-if="$route.params.id=='change_password'" />
                        <order-history v-if="$route.params.id=='order_history'" />
                        <addresses v-if="$route.params.id=='my_addresses'" />
                        <add-address v-if="$route.params.id=='add_address'" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>