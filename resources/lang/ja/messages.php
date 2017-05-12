<?php
return [
    'common' => [
        'error_when_update'         => 'Have error while process',
        'id_not_found'              => 'ID not found',
        'confirm_title'             => 'Confirm',
        'confirm_delete_question'   => 'Do you really want to delete?',
        'confirm_yes'               => 'Yes',
        'confirm_no'                => 'No',
        'user_not_found'            => 'User not found',
    ],
    'user' => [
        'login' => [
            'welcome'               => '住宅メーカ向け診断',
            'fails'                 => 'メール又はパスワードは正しくないので、再度確認してください。',
            'confirm_email_fails'   => 'Your email is not activated. Please click <a href="' . STRING_REPLACE . '">here</a> to activate',
        ],
        'confirm_email' => [
            'send_success'          => 'Send success. Please check email!',
            'send_fail'             => 'Sent fail. Please try again!',
            'active_email_success'  => 'Active email success. Please click <a href="' . STRING_REPLACE . '">here</a> to login',
            'active_email_error'    => 'Active email error. Please click <a href="' . STRING_REPLACE . '">here</a> to try again.',
        ],
        'delete_fail'               => 'Delete Fail',
        'delete_success'            => 'Delete Success',
        'edit_success'              => 'Edit Success',
        'edit_fail'                 => 'Edit Fail',
        'add_fail'                  => 'Add Fail',
        'add_success'               => 'Add Success',
    ],
    'customer' => [
        'edit_success'              => '成功にCustomerを編集しました。',
        'add_success'               => '成功にCustomerを追加しました。',
        'delete_success'            => '成功にCustomerを削除しました。',
        'edit_failed'               => '失敗にCustomerを編集しました。',
        'add_failed'                => '失敗にCustomerを追加しました。',
        'delete_failed'             => '失敗にCustomerを削除しました。',
    ],
    'ips' => [
        'edit_success'              => '成功にIPを編集しました。',
        'add_success'               => '成功にIPを追加しました。',
        'delete_success'            => '成功にIPを削除しました。',
        'edit_fail'                 => '失敗にIPを編集しました。',
        'add_fail'                  => '失敗にIPを追加しました。',
        'delete_fail'               => '失敗にIPを削除しました。',
    ],
    'company' => [
        'create_success'            => '成功に会社を追加しました。',
        'edit_success'              => '成功に会社を編集しました。',
        'delete_success'            => '成功に会社を削除しました。',
        'create_fail'               => '失敗に会社を追加しました。',
        'edit_fail'                 => '失敗に会社を編集しました。',
        'delete_fail'               => '失敗に会社を削除しました。',
    ],
    'question' => [
        'edit_success'              => '成功に質問を編集しました。',
        'add_success'               => '成功に質問を追加しました。',
        'delete_success'            => '成功に質問を削除しました。',
    ],
    'validator' => [
        'company' => [
            'email' => 'メールフォーマットは間違いです。',
        ],
    ],

];