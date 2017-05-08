<?php
// Common
if (!defined('STRING_REPLACE')) define('STRING_REPLACE', '%s');

if (!defined('MESSAGE_STATUS_ERROR')) define('MESSAGE_STATUS_ERROR', 'alert-danger');
if (!defined('MESSAGE_STATUS_SUCCESS')) define('MESSAGE_STATUS_SUCCESS', 'alert-success');
if (!defined('CONFIRM_EMAIL_INACTIVE')) define('CONFIRM_EMAIL_INACTIVE', 0);
if (!defined('CONFIRM_EMAIL_ACTIVE')) define('CONFIRM_EMAIL_ACTIVE', 1);

// Status of user
if (!defined('USER_NOT_CONFIRM_EMAIL')) define('USER_NOT_CONFIRM_EMAIL', 0);
if (!defined('USER_ACTIVE')) define('USER_ACTIVE', 1);

// Role
if (!defined('ROLE_ADMIN')) define('ROLE_ADMIN', 'admin');
if (!defined('ROLE_MASTER_STAFF')) define('ROLE_MASTER_STAFF', 'master_staff');
if (!defined('ROLE_SUB_STAFF')) define('ROLE_SUB_STAFF', 'sub_staff');

// Routing
if (!defined('ROUTER_USER')) define('ROUTER_USER', 'user');
if (!defined('ROUTER_ACTIVE_EMAIL')) define('ROUTER_ACTIVE_EMAIL', 'active_email');