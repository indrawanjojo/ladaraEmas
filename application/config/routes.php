<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	http://codeigniter.com/user_guide/general/routing.html
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
//digital produk sepulsa
//$route['default_controller'] = 'digital';

//digital produk guava
$route['default_controller'] = 'digital_products';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['p/(:any)'] = 'pages/read/$1';
$route['p/vcard'] = 'pages/vcard';

$route['c/(:any)'] = 'category/product/$1';
$route['c/(:any)/(:num)'] = 'category/product/$1';

$route['c/brand/(:any)'] = 'category/brand/$1';
$route['c/brand/(:any)/(:num)'] = 'category/brand/$1';

$route['c/(:any)/(:any)'] = 'category/sub/$1/$1';
$route['c/(:any)/(:any)/(:num)'] = 'category/sub/$1/$1';

$route['c/(:any)/(:any)/(:any)'] = 'category/child/$1/$1/$1';
$route['c/(:any)/(:any)/(:any)/(:num)'] = 'category/child/$1/$1/$1';


$route['catalog/(:any)'] = 'product/detail/$1';

$route['catalog'] = 'product';
$route['catalog/page/(:num)'] = 'product/index/$1';

$route['majalah'] = 'blog';
$route['majalah/artikel'] = 'blog/artikel';
$route['majalah/toko'] = 'blog/toko';
$route['majalah/event'] = 'blog/event';
$route['majalah/baca/(:any)'] = 'blog/read/$1';

$route['promosi/(:any)'] = 'microsite/promo/$1';
$route['promosi'] = 'microsite/promo_all';

$route['recent_view'] = 'product/recent_view';

$route['seller_registration'] = 'member/seller_registration';

$route['pulsa'] = 'digital_products/pulsa';
$route['paket_data'] = 'digital_products/paket_data';
$route['bpjs_kesehatan'] = 'digital_products/bpjs_kesehatan';
$route['pln_pulsa'] = 'digital_products/pln_pulsa';
$route['pln_tagihan'] = 'digital_products/pln_tagihan';
$route['telkom'] = 'digital_products/telkom';
$route['pdam'] = 'digital_products/pdam';
$route['multifinance'] = 'digital_products/multifinance';
$route['game_voucher'] = 'digital_products/game_voucher';
$route['tv_cable'] = 'digital_products/tv_cable';
$route['pascabayar_tagihan'] = 'digital_products/pascabayar_tagihan';
$route['ewallet'] = 'digital_products/ewallet';

$route['profil_register'] = 'ladara_emas/profil_register';

$route['deposit/topup'] = 'member/ionwallet_topup';
$route['deposit/history'] = 'member/history_ionwallet';
$route['deposit/transfer'] = 'member/transfer_ionwallet';
