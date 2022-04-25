let resources = [
    {
        name: 'item',
        parent: '',
        discreption: 'items resource',
        form_route: '/items/form',
        headers: ['name', 'code', 'unit.name', 'selling_price', 'quantity', 'tax.name', 'created_at']
    },
    {
        name: 'category',
        parent: '',
        form_route: '/categories/form',
        headers: ['name', 'created_at'],
        discreption: 'categories resource'
    },
    {
        name: 'unit',
        parent: '',
        form_route: '/units/form',
        headers: ['name', 'created_at'],
        discreption: 'categories resource'
    },
    {
        name: 'tax',
        parent: '',
        form_route: '/taxes/form',

        headers: ['name', 'percentage', 'created_at'],
        discreption: 'categories resource'
    },
    {
        name: 'user',
        parent: '',
        form_route: '/users/form',
        headers: ['name','role_id','permissions', 'user_name', 'email', 'mobile', 'created_at'],
        discreption: 'customers resource'
    },
    {
        name: 'order',
        parent: '',
        form_route: '/orders/form',

        headers: ['id', 'addresses.first_name', 'addresses.last_name', 'addresses.street_address', 'addresses.apt_suit_building', 'addresses.zip_code', 'addresses.city', 'addresses.country_region', 'addresses.email','addresses.phone_number', 'total', 'discount', 'tax', 'taxed_total', 'status', 'created_at'],
        discreption: 'orders resource',
       // no_success_msg: true
    },
    {
        name: 'orderitem',
        parent: '',
        headers: ['id', 'addresses.first_name', 'addresses.last_name', 'addresses.street_address', 'addresses.apt_suit_building', 'addresses.zip_code', 'addresses.city', 'addresses.country_region', 'addresses.email', 'addresses.phone_number', 'total', 'discount', 'tax', 'taxed_total', 'status', 'created_at'],
        discreption: 'orders resource',
        // no_success_msg: true
    },
    {
        name: 'item',
        parent: 'order',
        headers: ['order_id', 'item.name', 'quantity'],
        discreption: 'purchases resource'
    },
   
    {
        name: 'payment',
        parent: 'order',
        form_route: '/payments/form',

        module_name: 'order_payment',
        headers: ['order_id','date','status', 'amount'],
        discreption: 'payments resource'
    },
    {
        name: 'media',
        parent: 'gallery',
        discreption: 'gallery media resource'
    },
    {
        name: 'reaction',
        parent: 'item',
        discreption: 'item reaction resource',
        no_success_msg: true
    },
    {
        name: 'setting',
        parent: '',
        discreption: 'settings resource'
    },
    {
        name: 'media',
        parent: '',
        discreption: 'mails resource'
    },
    {
        name: 'media',
        parent: 'item',
        discreption: 'mails resource'
    },
    {
        name: 'rank',
        parent: 'item',
        discreption: 'friends resource',
        no_success_msg: true
    },
    {
        name: 'address',
        parent: '',
        discreption: 'address resource'
    },
    {
        name: 'coupon',
        parent: '',
        form_route: '/coupons/form',

        headers: ['id', 'code', 'value'],
        discreption: 'coupon resource'
    },
    {
        name: 'offer',
        parent: '',
        form_route: '/offerts/form',
        headers: ['id', 'name', 'percentage'],
        discreption: 'offer resource'
    },
    {
        name: 'item',
        parent: 'offer',
        discreption: 'offer resource'
    },
    {
        name: 'color',
        parent: '',
        discreption: 'color resource'
    },
    {
        name: 'size',
        parent: '',
        discreption: 'size resource'
    },
    {
        name: 'property',
        parent: '',
        discreption: 'color resource'
    },
    {
        name: 'payment',
        form_route: '/payments/form',
        parent: '',
        headers: ['order_id', 'status', 'order.addresses.first_name', 'order.addresses.last_name', 'order.addresses.street_address', 'order.addresses.apt_suit_building', 'order.addresses.zip_code', 'order.addresses.city', 'order.addresses.country_region', 'order.addresses.email', 'order.addresses.phone_number', 'order.discount', 'date', 'amount', 'created_at'],
        discreption: 'payment resource'
    },
    {
        name: 'dashboard',
        parent: '',

        discreption: 'dashboard resource'
    },
    {
        name: 'shipping',
        parent: '',
        headers: ['id', 'name'],
        form_route: '/shipping/form',
        discreption: 'dashboard resource'
    },
    {
        name: 'shippinga',
        parent: '',
        discreption: 'shippinga resource',

    },
    {
        name: 'send-reset-link',
        parent: '',
        discreption: 'reset password resource',

    },
    {
        name: 'reset-password',
        parent: '',
        discreption: 'reset password resource',

    },
    {
        name: 'contact',
        parent: '',
        form_route: '/contact/show',
        headers: ['id', 'name', 'message', 'subject', 'created_at'],
        discreption: 'contact us resource',

    },
    {
        name: 'most',
        parent: '',
        //form_route: '/contact/show',
        headers: ['id', 'name', 'message', 'subject', 'created_at'],
        discreption: 'most order resource',

    },
    
    {
        name: 'user.address',
        parent: 'user',
        //form_route: '/coupon/form',
        discreption: 'user address resource'
    }
]
export default resources;