<?php
return [

    // Title page
    'title.common'                      => 'Pittokuru',
    'title.short.common'                => 'PI',
    'title.user.login'                  => 'Login',
    'title.home.dashboard'              => 'Dashboard',
    'title.admin.home'                  => 'Admin',
    'title.admin.createAccount'         => 'Create Account',

    // Label
    'label' => [
        'common' => [
            'login'  => 'Login',
            'logOut'  => 'Log out',
            'profile'  => 'Profile',
            'home' => 'Home'
        ],
        'project' => [
            'admin' => [
                'btnCreateAccount'  => 'アカウント作成',
                'btnCreateBase'     => '拠点作成',
                'btnEditAccount'    => 'アカウント編集',
                'btnDeleteProject'  => '案件削除',
                'admin'             => 'Admin',
            ],
            'createAccount' => [
                'btnAddMore'    => '追加',
                'btnSave'       => '保存',
                'department'    => '部署',
                'base'          => '拠点',
                'name'          => '名前',
                'id'            => 'ID（メールアドレス）',
                'createAccount' => 'Create Account',
            ],
        ]
    ],

    // Placeholder
    'placeholder' => [
        'user' => [
            'login' => [
                'username' => 'Username',
                'password' => 'Password',
            ]
        ],
        'project' => [
            'createAccount' => [
                'department'    => '部署',
                'base'          => '拠点',
                'name'          => '名前',
                'id'            => 'ID（メールアドレス）',
            ],
        ]
    ],

    // Validator
    'validator' => [
        'user' => [
            'login' => [
                'username' => 'Email',
                'password' => 'Password',
            ]
        ],
    ],

    // Message
    'message' => [
        'common' => [
            'copyright' => '<strong>Copyright</strong> Pittokuru Company &copy; 2014-2017',
        ],
        'user' => [
            'login' =>  [
                'welcome' => 'Welcome to Pittokuru',
                'fails' => 'Email or password not wrong.',
            ],
        ],
    ],

    // Menu
    'menu' => [
        'managerUser' => '管理者メニュー',
        'createAccount' => 'アカウント作成',
        'editAccount' => 'アカウント編集',
        'createCompany' => '拠点作成',
        'deleteProject' => '案件削除',
        'managerProject' => '案件メニュー',
        'createProject' => '案件作成画面',
        'editProject' => '案件編集',
        'listProject' => '案件一覧',
        'resultProject' => '案件結果入力',
        'chooseProject' => '案件（選定中）',
        'detailProject' => '案件詳細画面',
        'report' => '集計画面',
    ],

];