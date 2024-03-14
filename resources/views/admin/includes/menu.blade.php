<!-- need to remove -->
@include('admin.partials.menu_buttons', [
        'menuItems' => [
            [
                'pageSlug' => 'dashboard',
                'routeName' => 'admin.dashboard',
                'iconClass' => 'fas fa-home',
                'label' => 'Dashboard',
            ],
            [
                'pageSlug' => 'admin',
                'routeName' => 'am.admin.admin_list',
                'iconClass' => 'fas fa-home',
                'label' => 'Admin',
            ],
        ],
    ])
