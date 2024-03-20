<!-- need to remove -->
@include('admin.partials.menu_buttons', [
        'menuItems' => [
            [
                'pageSlug' => 'dashboard',
                'routeName' => 'admin.dashboard',
                'iconClass' => 'fa-solid fa-chart-line',
                'label' => 'Dashboard',
            ],
            [
                'pageSlug' => 'admin',
                'routeName' => 'am.admin.admin_list',
                'iconClass' => 'fa-solid fa-user-tie',
                'label' => 'Admins',
            ],
            [
                'pageSlug' => 'company',
                'routeName' => 'company.company_list',
                'iconClass' => 'fa-solid fa-shop-lock',
                'label' => 'Companies',
            ],
            [
                'pageSlug' => 'hosting',
                'routeName' => 'hosting.hosting_list',
                'iconClass' => 'fa-solid fa-server',
                'label' => 'Hostings',
            ],
            [
                'pageSlug' => 'domain',
                'routeName' => 'domain.domain_list',
                'iconClass' => 'fa-solid fa-globe',
                'label' => 'Domains',
            ],
            [
                'pageSlug' => 'payment',
                'routeName' => 'payment.payment_list',
                'iconClass' => 'fa-regular fa-money-bill-1',
                'label' => 'Payments',
            ],
        ],
    ])

<li class="nav-item 
@if ($pageSlug == 'domain') menu-is-opening menu-open @endif">

    <a href="javescript:void(0)" class="nav-link @if ($pageSlug == 'domain') active @endif">
        <i class="fa-solid fa-people-roof"></i>
        <p>
            {{ __('Report') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="@if ($pageSlug == 'domain') display:block @endif">
        @include('admin.partials.menu_buttons', [
        'menuItems' => [
            [
                'pageSlug' => 'company_report',
                'routeName' => 'company_report.company_report_search',
                'label' => 'Company Report',
            ],
            [
                'pageSlug' => 'domain',
                'routeName' => 'domain.domain_list',
                'label' => 'Hosting Report',
            ],
            [
                'pageSlug' => 'domain',
                'routeName' => 'domain.domain_list',
                'label' => 'Domain Report',
            ],      
        ],
    ])

    </ul>
</li>
