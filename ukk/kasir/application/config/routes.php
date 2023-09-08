<?php
defined('BASEPATH') or exit('No direct script access allowed');

//root base
$route['default_controller'] = 'welcome';
$route['menu'] = 'welcome/menu';
$route['order'] = 'welcome/order';
$route['history'] = 'welcome/history';
$route['transaksi'] = 'welcome/transaksi';
$route['transaksi1'] = 'welcome/transaksi1';
$route['transaksi2'] = 'welcome/transaksi2';
$route['home'] = 'welcome/home';
$route['signup'] = 'welcome/signiup';
$route['logout'] = 'welcome/logout';

//root user
$route['user'] = 'welcome/user';
$route['user/baru'] = 'welcome/user_baru';
$route['user/simpan'] = 'welcome/user_simpan';
$route['user/edit/(:any)'] = 'welcome/user_edit/$1';
$route['user/update'] = 'welcome/user_update';
$route['user/delete/(:any)'] = 'welcome/user_hapus/$1';

//root menu
$route['menu/baru'] = 'welcome/menu_baru';
$route['menu/simpan'] = 'welcome/menu_simpan';
$route['menu/edit/(:any)'] = 'welcome/menu_edit/$1';
$route['menu/update'] = 'welcome/menu_update';
$route['menu/delete/(:any)'] = 'welcome/menu_hapus/$1';

//root order

//root pengaturan
$route['pengaturan/edit/(:any)'] = 'welcome/pengaturan_edit/$1';
$route['pengaturan/update'] = 'welcome/pengaturan_update';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
