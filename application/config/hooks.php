<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|    https://codeigniter.com/userguide3/general/hooks.html
|
 */

$hook['pre_system'] = [
    'class' => 'Lib_env',
    'function' => 'main',
    'filename' => 'Lib_env.php',
    'filepath' => 'hooks',
];

$hook['post_controller'] = [
    'class' => 'Auth_hook',
    'function' => 'isLoggedIn',
    'filename' => 'Auth_hook.php',
    'filepath' => 'hooks',
];
