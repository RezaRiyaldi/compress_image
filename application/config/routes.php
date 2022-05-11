<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'c_home/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// AUTH
$route['register'] = 'c_home/register';
$route['login'] = 'c_home/login';
$route['logout'] = 'c_home/logout';
$route['lupa_password'] = 'c_home/lupa_password';

// HOME
$route['home'] = 'c_home';
$route['upload_image'] = 'c_home/upload_image';
$route['history'] = 'c_home/history';
$route['setting_akun'] = 'c_home/setting_akun';
$route['setting_akun/(:any)'] = 'c_home/setting_akun/$1';
