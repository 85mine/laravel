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
    'title.project.edit'                => '案件結果入力',
    'title.admin.home'                  => '管理者メニュー',
    'title.admin.createAccount'         => 'アカウント作成',
    'title.admin.editAccount'           => 'アカウント編集',
    'title.admin.createBase'            => '拠点作成',

    // Label
    'label' => [
        'common' => [
            'login' => 'ログイン',
            'logOut' => 'ログアウト',
            'profile' => 'プロフィール',
            'home' => 'ホーム',
            'btnAddMore'    => '追加',
            'btnSave'       => '保存',
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
            'editAccount' => [
                'btnDelete'     => '削除',
                'btnSave'       => '保存',
                'department'    => '部署',
                'base'          => '拠点',
                'name'          => '名前',
                'id'            => 'ID（メールアドレス）',
                'editAccount'   => 'アカウント編集'
             ],
            'createBase' => [
                'createBase'    => '拠点作成',
                'department'    => '部署',
                'base'          => '拠点',
                'company'       => '会社',
                'short_name'    => '略称'
            ]
        ],
        'project' => [
            'menu' => [
                'create' => '案件作成',
                'edit' => '案件編集',
            ],
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
            'create' =>[
                'createProject' => '案件作成',
                'editProject' => '案件編集',
                'saveProject' => '保存',
                'copyProject' => '保存してコピー',
                'personCareProject' => '担当者',
                'createDateProject' => '作成日',
                'deadlineDateProject' => '回答期限',
                'egProject' => 'EG',
                'attractiveProject' => '競合',
                'customerName' => '顧客名',
                'projectName' => '案件名',
                'serviceName' => 'サービス',
                'trialPeriodDate' => '試算期限',
                'estimatePeriodDate' => '見積期限',
                'startBusinessDate' => '業務開始日',
                'budgetProject' => '予算',
                'suggestCompany' => '拠点指名',
                'assignCompany' => '受け入れ拠点',
                'detailProject' => '案件詳細',
            ],
            'edit' => [
                'edit_button'       => '編集',
                'budget'            => '予算',
                'accepting_base'    => '受け入れ拠点',
                'result'            => '結果',
                'case_details'      => '案件詳細',
                'pit_sapporo'       => 'PIT 札幌',
                'candidacy'         => '立候補',
                'select'            => '選定',
                'pco_sendai'        => 'PCO 仙台',
                'condition'         => '条件付き',
                'pit_nagoya'        => 'PIT 名古屋',
                'dismiss'           => '辞退',
                'reason'            => '理由',
                'base'              => '拠点',
                'reason_for_select' => '選定理由',
                'update_button'     => '更新',
                'save_button'       => '保存',
                'cancel_button'     => 'キャンセル',
                'saler'             => '担当'
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
                'route-chosing' => '選定中案件'
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
                'username' => 'アカウント',
                'password' => 'パスワード',
            ]
        ],

        'common'=> [
            'currency' => '¥ 999,999,999.99',
            'enter_message' => '案件詳細を入力してください',
        ],

        'admin' => [
            'createAccount' => [
                'department'    => '部署',
                'base'          => '拠点',
                'name'          => '名前',
                'id'            => 'ID（メールアドレス）',
            ],
            'createBase'    => [
                'department'    => '部署',
                'base'          => '拠点',
                'company'       => '会社',
                'short_name'    => '略称'
            ]
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
                'selectSystem' => '拠点選定システム',
                'answerSystem' => 'はい!!やります!!',
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
        'createProject' => '案件作成',
        'editProject' => '案件編集',
        'listProject' => '案件一覧',
        'resultProject' => '案件結果入力',
        'chooseProject' => '選定中案件',
        'detailProject' => '案件詳細画面',
        'report' => '集計画面',
    ],

];