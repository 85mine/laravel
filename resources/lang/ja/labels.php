<?php
return [
    // title
    'title.common'                      => '住宅メーカ向け診断',
    'title.short.common'                => 'BS',
    'title.user.login'                  => 'ログイン',
    'title.user.confirm_email'          => 'Confirm email',
    'title.user.active_email'           => 'Active email',
    'title.user.list'                   => 'User List',
    'title.user.create'                 => 'User Add',
    'title.user.edit'                   => 'Edit User',
    'title.home.dashboard'              => 'Dashboard',
    'title.ips'                         => 'IP',
    'title.ips.create'                  => 'Add IP',
    'title.ips.edit'                    => 'Edit IP',
    'title.qr.create'                   => 'Create Qr',
    'title.qr.edit'                     => 'Edit Qr',
    'title.company'                     => 'Company',
    'title.company.create'              => 'Create Company',
    'title.company.edit'                => 'Edit Company',

    // Label
    'label' => [
        'common' => [
            'login'                     => 'ログイン',
            'logOut'                    => 'ログアウト',
            'profile'                   => 'プロフィール',
            'home'                      => 'ホーム',
            'btnAddMore'                => '追加',
            'btnSave'                   => '保存',
            'btnCancel'                 => 'Cancel',
            'btnEdit'                   => 'Edit',
            'btnDelete'                 => 'Delete',
            'nameOfAdminEmail'          => 'Admin',
            'bulkDelete'                => 'Bulk Delete'
        ],
        'user' => [
            'confirm_email' => [
                'description' => 'Please check email or request new email to active',
                'send_email' => 'Send new email',
            ],
            'list' => [
                'name'      => 'Name',
                'email'     => 'Email',
                'status'    => 'Status',
                'company'   => 'Company',
            ],
            'create' => [
                'name'      => 'Name',
                'email'     => 'Email',
                'company'   => 'Company',
                'selectCompany' => 'Please select company'
            ],
        ],
        'ips' => [
            'page_title'    => 'Ips Management',
            'column'        => [
                'ip_address'            => 'Ip Address',
                'description'           => 'Description'
            ],
            'breadcrumb'    => [
                'edit'                  => 'Edit IP',
                'add'                   => 'Add New IP'
            ]
        ],
        'company' => [
            'page_title'    => 'Companies Management',
            'column'        => [
                'company_name'                  => 'Name',
                'company_address'               => 'Address',
                'company_mobile'                => 'Mobile',
                'company_email'                 => 'Email',
                'company_website'               => 'Website',
                'representative_name'           => 'Represent Name',
                'representative_mobile'         => 'Represent Mobile',
            ],
            'breadcrumb'    => [
                'index'                 => 'Companies',
                'edit'                  => 'Edit Company',
                'add'                   => 'Add Company'
            ]
        ],
        'question' => [
            'page_title'    => 'Questions Management',
            'label'         => [
                'add_more'              =>  'Add More',
                'remove'                =>  'Remove'
            ],
            'column'        => [
                'content'               => 'Question',
                'answer'                => 'Answer'
            ],
            'breadcrumb'    => [
                'edit'                  => 'Edit Question',
                'add'                   => 'Add New Question'
            ]
        ]
    ],

    // Placeholder
    'placeholder' => [
        'user' => [
            'login' => [
                'username' => 'アカウント',
                'password' => 'パスワード',
            ],
        ],
    ],

    // Email
    'email' => [
        'confirm_email' => [
            'title' => 'Confirm email'
        ],
    ],
];