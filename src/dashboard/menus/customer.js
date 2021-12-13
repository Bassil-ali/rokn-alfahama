let list = [{
        icon: 'mdi-view-dashboard',
        title: 'dashboard',
        to: '/',
    },

    {
        title: 'orders',
        icon: 'mdi-order-bool-descending-variant',
        to: '/orders',
        children: [{
                title: 'view',
                icon: 'fas fa-eye',
                to: '',
                group: 'orders'
            },
            // {
            //     title: 'create',
            //     icon: 'fas fa-plus',
            //     to: 'form',
            //     group: 'orders'
            // },
        ]
    },
    {
        title: 'tasks',
        icon: 'mdi-file-tree',
        to: '/tasks',
        children: [{
                title: 'view',
                icon: 'fas fa-eye',
                to: '',
                group: 'tasks'
            },
            // {
            //     title: 'create',
            //     icon: 'fas fa-plus',
            //     to: 'form',
            //     group: 'tasks'
            // },
        ]
    },
    {
        title: 'payments',
        icon: 'mdi-credit-card-outline',
        to: '/payments',
        children: [{
                title: 'view',
                icon: 'fas fa-eye',
                to: '',
                group: 'payments'
            },
            // {
            //     title: 'create',
            //     icon: 'fas fa-plus',
            //     to: 'form',
            //     group: 'payments'
            // },
        ]
    },
];
export default list;