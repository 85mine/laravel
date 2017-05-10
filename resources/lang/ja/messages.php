<?php
return [
    'common' => [
        'error_when_update' => 'Have error while process',
    ],
    'user' => [
        'login' => [
            'welcome' => '住宅メーカ向け診断',
            'fails' => 'メール又はパスワードは正しくないので、再度確認してください。',
            'confirm_email_fails' => 'Your email is not activated. Please click <a href="' . STRING_REPLACE . '">here</a> to activate',
        ],
        'confirm_email' => [
            'send_success' => 'Send success. Please check email!',
            'send_fail' => 'Sent fail. Please try again!',
            'active_email_success' => 'Active email success. Please click <a href="' . STRING_REPLACE . '">here</a> to login',
            'active_email_error' => 'Active email error. Please click <a href="' . STRING_REPLACE . '">here</a> to try again.',
        ],
    ],
];