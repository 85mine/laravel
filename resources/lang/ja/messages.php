<?php
return [

    // Title page
    'title.common'                      => 'Pittokuru',
    'title.short.common'                => 'PI',
    'title.user.login'                  => 'Login',
    'title.home.dashboard'              => 'Dashboard',
    'title.project.list'                => '案件一覧',
    'title.admin.home'                  => '管理者メニュー',
    'title.admin.createAccount'         => 'アカウント作成',

    // Label
    'label' => [
        'common' => [
            'login' => 'Login',
            'logOut' => 'Log out',
            'profile' => 'Profile',
            'home' => 'Home'
        ],
        'admin' => [
            'admin' => [
                'btnCreateAccount'  => 'アカウント作成',
                'btnCreateBase'     => '拠点作成',
                'btnEditAccount'    => 'アカウント編集',
                'btnDeleteProject'  => '案件削除',
                'admin'             => '管理者メニュー',
            ],
            'createAccount' => [
                'btnAddMore'    => '追加',
                'btnSave'       => '保存',
                'department'    => '部署',
                'base'          => '拠点',
                'name'          => '名前',
                'id'            => 'ID（メールアドレス）',
                'createAccount' => 'アカウント作成',
            ],
        ],
        'project' => [
            'list' => [
                'saler'         => '営業担当',
                'date'          => '日付',
                'customer'      => '顧客名',
                'branch'        => '拠点名',
                'result'        => '結果',
                'candidacy'     => '立候補',
                'service'       => 'サービス',
                'reset_button'  => 'クリア',
                'go_button'     => 'GO!'
            ],
            'chosing' => [
                'title' => '選定中案件',
                'chosingProject' => '選定中案件',
                'project' => '件',
                'endProject' => '選定終了案件',
                'undefined' => '未確定',
                'received' => '受注',
                'loss' => '失注',
                'route-project' => 'Project',
                'route-chosing' => 'Chosing'
            ],
        ],
    ],

    // Placeholder
    'placeholder' => [
        'user' => [
            'login' => [
                'username' => 'Username',
                'password' => 'Password',
            ]
        ],
        'admin' => [
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
            'login' => [
                'welcome' => 'Welcome to Pittokuru',
                'fails' => 'Email or password not wrong.',
            ],
        ],
        'project' => [
            'list' =>  [
                'accept_order' => '受注',
                'loss_order' => '失注',
                'pending_order'=>'ペンディング'
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