<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "user/user_controller";
$route['admin'] = "admin/login_controller";
$route['login'] = "admin/login_controller";
$route['admin/home'] = "admin/home_controller";
$route['admin/category'] = "admin/category_controller";
$route['admin/category/add'] = "admin/category_controller/add_category";
$route['admin/category/edit/(:any)'] = "admin/category_controller/edit_category";
$route['admin/category/delete/(:any)'] = "admin/category_controller/delete_category";
$route['admin/brand'] = "admin/brand_controller";
$route['admin/brand/add'] = "admin/brand_controller/add_brand";
$route['admin/brand/edit/(:num)'] = "admin/brand_controller/edit_brand";
$route['admin/brand/delete/(:num)'] = "admin/brand_controller/delete_brand";
$route['admin/product'] = "admin/product_controller";
$route['admin/product/add'] = "admin/product_controller/add_product";
$route['admin/product/edit/(:num)'] = "admin/product_controller/edit_product";
$route['admin/product/edit_image/(:num)'] = "admin/product_controller/edit_image";
$route['admin/product/delete/(:num)'] = "admin/product_controller/delete_product";
$route['admin/customer'] = "admin/customer_controller";
$route['admin/customer/delete/(:num)'] = "admin/customer_controller/delete_customer";
$route['admin/order'] = "admin/order_controller";
$route['admin/report'] = "admin/report_controller";

//user end routing

$route['products/(:num)'] = "user/user_controller/product_page/$1";
$route['products/(:any)'] = "user/user_controller/product_view_page/$1";
$route['shopping_cart'] = "user/cart_controller/show_cart";
$route['buy/steps'] = "user/cart_controller/steps";
$route['404_override'] = '';


$route['user_controller/remove_from_cart/(:any)'] = "user/cart_controller/remove_from_cart/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */