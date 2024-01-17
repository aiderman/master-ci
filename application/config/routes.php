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
$route['default_controller']        = 'c_login';
$route['login']                     = 'c_login';
$route['logout']                    = 'c_login/logout';
$route['cek_login']                 = 'c_login/cek_login';

// user

$route['user/halaman_utama']        = 'C_user';
$route['user/edit_profil']        = 'C_user/edit_profil';
$route['user/ganti_pass']        = 'C_user/ganti_pass';
$route['user/jadwal']        = 'C_user/jadwal';
$route['user/input_jadwal']        = 'C_user/input_jadwal';



$route['destroy_session']           = 'C_session_destroy';


// error
$route['error']                     = 'Error_empty';
$route['destroy_session']           = 'C_session_destroy';


$route['404_override']              = 'Error_404';
$route['translate_uri_dashes']      = FALSE;
