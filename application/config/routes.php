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

$route['default_controller'] = 'IndexController';
$route['404_override'] = 'IndexController/error';
$route['translate_uri_dashes'] = FALSE;

$route['(re-order).html']="IndexController/reorder/";

//Backend
$route['(admin/dang-nhap|login).html'] = "admin/home/login/";
$route['(admin/dang-xuat|logout).html'] = "admin/home/logout/";
$route['admin'] = "admin/home/index";

$route['(trang-chu).html']="IndexController";



$route['(dang-nhap).html'] = "auth/login/";
$route['(dang-ky).html'] = "auth/register/";
$route['(thoat).html'] = "auth/logout/";
//$route['(thong-tin-tai-khoan).html'] = "auth/infouser/";
$route['(thong-tin-tai-khoan).html'] = "auth/updateuser/";
$route['(so-dia-chi).html'] = "auth/listaddress/";
$route['(them-dia-chi).html'] = "auth/addaddress/";
$route['(cap-nhat-dia-chi).html'] = "auth/editaddress/";
$route['(quen-mat-khau).html'] = "auth/forgetpass/";
$route['(thong-tin-don-hang).html'] = "auth/order/";
$route['(chi-tiet-don-hang).html'] = "auth/orderdetail/";
$route['(thong-tin-chung).html'] = "auth/account/";



$route['(:any)-lv(:num).html']="activity/listnews/$1";
$route['(:any)-lv(:num).html/page/(:num)']="activity/listnews/$1/$3";
$route['(:any)-l(:num).html'] = 'activity/detail/$2';

$route['(:any)-t(:num).html']="product/listproduct/$2";
$route['(:any)-t(:num).html/page/(:num)']="product/listproduct/$2/$3";
$route['(:any)-b(:num).html']="product/listbrand/$2";
$route['(:any)-b(:num).html/page/(:num)']="product/listbrand/$2/$3";
$route['(:any)-p(:num).html'] = 'product/detail/$2';
$route['(:any)-c(:num).html']="product/cateproduct/$2";

$route['(tim-kiem).html'] = "product/search/";
$route['(lien-he).html'] = "contact/index/";

$route['(danh-sach-san-pham-yeu-thich).html']="product/listliked";
$route['(danh-sach-san-pham-yeu-thich).html/page/(:num)']="product/listliked/$2";

$route['(de-danh-mua-sau).html']="product/listdedanh";
$route['(de-danh-mua-sau).html/page/(:num)']="product/listdedanh/$2";

$route['(san-pham-ban-chay).html']="product/listbanchay";
$route['(san-pham-ban-chay).html/page/(:num)']="product/listbanchay/$2";

$route['(san-pham-danh-gia).html']="product/listrating";
$route['(san-pham-danh-gia).html/page/(:num)']="product/listrating/$2";

$route['(:any)-ta(:num).html']="album/listalbum/$1";
$route['(:any)-ta(:num).html/page/(:num)']="album/listalbum/$1/$3";
$route['(:any)-a(:num).html']="album/detail/$2";

$route['(video-clips).html']="video/index";
$route['(video-clips).html/page/(:num)']="video/index/$2";

$route['(thuong-hieu).html']="product/brand";

$route['(lien-he).html'] = "contact/index/";
$route['(site-map).html'] = "contact/sitemap/";
$route['(gui-mail).html'] = "IndexController/sentmail/";

$route['(mua-hang)-(:num).html']="cart/addcart/$2";
$route['(gio-hang).html']="cart/listcart/";

$route['(dat-hang).html'] = "cart/add/";
$route['(gio-hang).html'] = "cart/cart/";
$route['(dia-chi-giao-hang).html'] = "cart/shipping/";
$route['(xoa-gio-hang).html'] = "cart/delcart/";
$route['(cap-nhat-gio-hang).html'] = "cart/updatecart/";
$route['(thanh-toan).html'] = "cart/pay/";
$route['(don-hang).html'] = "cart/managerpay/";
$route['(don-hang-chi-tiet).html'] = "cart/detailpay/";
$route['(dat-hang-thanh-cong).html'] = "cart/pay_success/";
$route['(kiem-tra-don-hang).html'] = "cart/checkorder/";
$route['(thanh-toan-paypal).html'] = "cart/paypal/";
$route['(hinh-thuc-chuyen-khoan).html'] = "cart/paytransfer/";
$route['(thanh-toan-tien-mat).html'] = "cart/paymoney/";

$route['(dat-phong).html'] = "phong/index/";
$route['(dat-phong-thanh-cong).html'] = "phong/success/";


$route['(:any).html'] = 'Route/index/$1';
$route['(:any).html/page/(:num)']="Route/index/$1/$2";