let list = [{
    title: 'dashboard',
    icon: 'fas fa-dash',
    to: '/',
},
// {
//     icon: 'fas fa-user',
//     title: 'user',
//     to: '/profile',
// },
{
    title: 'site_settings',
    icon: 'fas fa-cog',
    to: '/settings',
    children: [
        {
            title: 'create',
            icon: 'fas fa-plus',
            to: 'form',
            group: 'settings'
        },
    ]
},
{
    title: 'offerts',
    icon: 'fas fa-cart-plus',
    to: '/offerts',
    children: [{
        title: 'view',
        icon: 'fas fa-eye',
        to: '',
        group: 'offerts'
    },
    {
        title: 'create',
        icon: 'fas fa-plus',
        to: 'form',
        group: 'offerts'
    },
    ]
},
{
    title: 'items',
    icon: 'fas fa-cart-plus',
    to: '/items',
    children: [{
        title: 'view',
        icon: 'fas fa-eye',
        to: '',
        group: 'items'
    },
    {
        title: 'create',
        icon: 'fas fa-plus',
        to: 'form',
        group: 'items'
    },
    ]
},

{
    title: 'categories',
    icon: 'fas fa-tags',
    to: '/categories',
    children: [{
        title: 'view',
        icon: 'fas fa-eye',
        to: '',
        group: 'categories'
    },
    {
        title: 'create',
        icon: 'fas fa-plus',
        to: 'form',
        group: 'categories'
    },
    ]
},
{
    title: 'units',
    icon: 'fas fa-weight-hanging',
    to: '/units',
    children: [{
        title: 'view',
        icon: 'fas fa-eye',
        to: '',
        group: 'units'
    },
    {
        title: 'create',
        icon: 'fas fa-plus',
        to: 'form',
        group: 'units'
    },
    ]
},
{
    title: 'taxes',
    icon: 'far fa-money-bill-alt',
    to: '/taxes',
    children: [{
        title: 'view',
        icon: 'fas fa-eye',
        to: '',
        group: 'taxes'
    },
    {
        title: 'create',
        icon: 'fas fa-plus',
        to: 'form',
        group: 'taxes'
    },
    ]
},
// {
//     title: 'currencies',
//     icon: 'fas fa-coins',
//     to: '/currencies',
//     children: [{
//         title: 'view',
//         icon: 'fas fa-eye',
//         to: '',
//         group: 'currencies'
//     },
//     {
//         title: 'create',
//         icon: 'fas fa-plus',
//         to: 'form',
//         group: 'currencies'
//     },
//     ]
// },
{
    title: 'coupons',
    icon: 'fas fa-percentage',
    to: '/coupons',
    children: [{
        title: 'view',
        icon: 'fas fa-eye',
        to: '',
        group: 'coupons'
    },
    {
        title: 'create',
        icon: 'fas fa-plus',
        to: 'form',
        group: 'coupons'
    },
    ]
},
{
    title: 'shipping',
    icon: 'fas fa-percentage',
    to: '/shipping',
    children: [{
        title: 'view',
        icon: 'fas fa-eye',
        to: '',
        group: 'shipping'
    },
    {
        title: 'create',
        icon: 'fas fa-plus',
        to: 'form',
        group: 'shipping'
    },
    ]
},
{
    title: 'users',
    icon: 'fas fa-users',
    to: '/users',
    children: [{
        title: 'view',
        icon: 'fas fa-eye',
        to: '',
        group: 'users'
    },
    // {
    //     title: 'create',
    //     icon: 'fas fa-plus',
    //     to: 'form',
    //     group: 'users'
    // },
    ]
},
// {
//     title: 'types',
//     icon: 'mdi-format-font',
//     to: '/types',
//     children: [{
//             title: 'view',
//             icon: 'fas fa-eye',
//             to: '',
//             group: 'types'
//         },
//         {
//             title: 'create',
//             icon: 'fas fa-plus',
//             to: 'form',
//             group: 'types'
//         },
//     ]
// },
{
    title: 'orders',
    icon: 'fas fa-clipboard-list',
    to: '/orders',
    children: [{
        title: 'view',
        icon: 'fas fa-eye',
        to: '',
        group: 'orders'
    },
    {
        title: 'create',
        icon: 'fas fa-plus',
        to: 'form',
        group: 'orders'
    },
    ]
},
{
    title: 'payments',
    icon: 'fas fa-money-check-alt',
    to: '/payments',
    children: [{
        title: 'view',
        icon: 'fas fa-eye',
        to: '',
        group: 'payments'
    },
    {
        title: 'create',
        icon: 'fas fa-plus',
        to: 'form',
        group: 'payments'
    },
    ]
},
{
        title: 'contact',
        icon: 'fas fa-users',
        to: '/contact',
        children: [{
            title: 'view',
            icon: 'fas fa-eye',
            to: '',
            group: 'contact'
        },
        
        ]
    }

];
export default list;