<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['login']                     = 'c_login';
$route['logout']                    = 'c_login/logout';
$route['cek_login']                 = 'c_login/cek_login';

// user

$route['user/halaman_utama']        = 'C_user';
$route['user/profil']        = 'C_user/profil';
$route['user/edit_profil']        = 'C_user/edit_profil';
$route['user/tambah']        = 'C_user/tambah_data';
$route['user/updatelog']        = 'C_user/update_data_log';
$route['user/ganti_pass']        = 'C_user/ganti_pass';
$route['user/verif_pass']        = 'C_user/verif_ganti_pass';
$route['user/jadwal']        = 'C_user/jadwal';
$route['user/input_jadwal']        = 'C_user/input_jadwal';
$route['user/get/(:num)']        = 'C_user/get/$1';
$route['user/get_log/(:num)']        = 'C_user/get_log/$1';
$route['user/edit']        = 'C_user/edit';
$route['user/logbook']        = 'C_user/logbook';
$route['user/logbook_login']        = 'C_user/logbook_login';
$route['user/logbook_cek']        = 'C_user/logbook_login_cek';

$route['admin/halaman_utama']        = 'C_admin';
$route['admin/data_perawat']        = 'C_admin/data_perawat';
$route['admin/profil']        = 'C_admin/profil';
$route['admin/edit_profil']        = 'C_admin/edit_profil';
$route['admin/tambah_log']        = 'C_admin/tambah_log';
$route['admin/updatelog']        = 'C_admin/update_data_log';
$route['admin/ganti_pass']        = 'C_admin/ganti_pass';
$route['admin/verif_pass']        = 'C_admin/verif_ganti_pass';
$route['admin/jadwal']        = 'C_admin/jadwal';
$route['admin/input_jadwal']        = 'C_admin/input_jadwal';
$route['admin/get/(:num)']        = 'C_admin/get/$1';
$route['admin/get_log/(:num)']        = 'C_admin/get_log/$1';
$route['admin/edit']        = 'C_admin/edit';
$route['admin/logbook']        = 'C_admin/logbook';
$route['admin/logbook_login']        = 'C_admin/logbook_login';
$route['admin/logbook_cek']        = 'C_admin/logbook_login_cek';

$route['destroy_session']           = 'C_session_destroy';


// error
$route['error']                     = 'Error_empty';
$route['destroy_session']           = 'C_session_destroy';

$route['default_controller']        = 'c_login';
$route['404_override']              = 'Error_404';
$route['translate_uri_dashes']      = FALSE;
