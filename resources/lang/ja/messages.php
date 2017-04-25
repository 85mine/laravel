<?php
return [

    // Title page
    'title.common'                      => '拠点選定システム',
    'title.short.common'                => 'BS',
    'title.user.login'                  => 'ログイン',
    'title.home.dashboard'              => 'Dashboard',
    'title.home'                        => 'ホーム',
    'title.report'                      => '集計',
    'title.project.list'                => '案件一覧',
    'title.admin.home'                  => '管理者メニュー',
    'title.admin.createAccount'         => 'アカウント作成',

    // Label
    'label' => [
        'common' => [
            'login' => 'ログイン',
            'logOut' => 'ログアウト',
            'profile' => 'プロフィール',
            'home' => 'ホーム'
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
                'route-project' => 'プロジェクト',
                'route-chosing' => 'Chosing'
            ],
        ],
        'report' => [
            'from' => '日付',
            'to' => '日付',
            'sales_staff' => '営業担当',
            'base_name' => '拠点名',
            'clear' => 'クリア',
            'go' => 'GO!',
            'preparative' => '立候補',
            'selective' => '選定',
            'undefined' => '未確定',
            'accepting_orders' => '受注',
            'loss_orders' => '失注',
            'rank' => '位',
            'company' => '会社',
            'base' => '拠点',
            'preparative_rank' => '立候補順位',
            'declining_rank' => '辞退順位',
            'selection_rank' => '選定順位',
            'order_base_rank' => '受注拠点順位',
            'order_business_rank' => '受注営業順位',
            'order_combination' => '受注組み合わせ'
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
                'username' => 'メール',
                'password' => 'パスワード',
            ]
        ],
    ],

    // Message
    'message' => [
        'common' => [
            'copyright' => '<strong>Copyright</strong> &copy; PITCREW Co.,Ltd. All Rights Reserved.',
        ],
        'user' => [
            'login' => [
                'welcome' => 'Welcome to Pittokuru',
                'fails' => 'メール又はパスワードは正しくないので、再度確認してください。',
            ]
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