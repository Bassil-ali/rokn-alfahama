let list = [{
        icon: 'mdi-view-dashboard',
        title: 'dashboard',
        to: '/',
    },
    {
        icon: 'mdi-account',
        title: 'user',
        to: '/pages/user',
    },
    {
        title: 'customers',
        icon: 'mdi-face-agent',
        to: '/customers',
        children: [{
                title: 'view',
                icon: 'fas fa-eye',
                to: '',
                group: 'customers'
            },
            {
                title: 'create',
                icon: 'fas fa-plus',
                to: 'form',
                group: 'customers'
            },
        ]
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
            {
                title: 'create',
                icon: 'fas fa-plus',
                to: 'form',
                group: 'orders'
            },
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
            {
                title: 'create',
                icon: 'fas fa-plus',
                to: 'form',
                group: 'tasks'
            },
        ]
    },
    {
        title: 'task_confirmations',
        icon: 'mdi-ticket-confirmation-outline',
        to: '/task_confirmations',
        children: [{
                title: 'view',
                icon: 'fas fa-eye',
                to: '',
                group: 'task_confirmations'
            },
            {
                title: 'create',
                icon: 'fas fa-plus',
                to: 'form',
                group: 'task_confirmations'
            },
        ]
    },
];
export default list;