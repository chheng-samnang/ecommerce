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
/*$route['default_controller'] = 'admin/accountController';*/
$route['default_controller'] = 'Home';
$route['product_page_detail'] = 'product/product_page_detail/$1';
$route['main'] = 'admin/mainController';
$route['category'] = 'admin/categoryController';
$route['category/add'] = 'admin/categoryController/add_category';
$route['category/edit/(:num)'] = 'admin/categoryController/edit_category/$1';
$route['category/delete/(:num)'] = 'admin/categoryController/deleteCategory/$1';
$route['brand'] = 'admin/brand_c';
$route['brand/add'] = 'admin/brand_c/add';
$route['account'] = 'admin/accountController';
$route['account/add'] = 'admin/accountController/add_account';
$route['account/edit/(:num)'] = 'admin/accountController/edit_account/$1';
$route['account/changpassword/(:num)'] = 'admin/accountController/changpassword/$1';
$route['account/delete/(:num)'] = 'admin/accountController/delete_account/$1';
$route['location'] = 'admin/locationController';
$route['location/add'] = 'admin/locationController/add_location';
$route['location/edit/(:any)'] = 'admin/locationController/edit_location/$1';
$route['location/delete/(:num)'] = 'admin/locationController/delete_location/$1';
$route['stock'] = 'admin/stockController';
$route['stock/add'] = 'admin/stockController/add_stock';
$route['stock/edit/(:num)'] = 'admin/stockController/edit_stock/$1';
$route['stock/delete/(:num)'] = 'admin/stockController/delete_stock/$1';
$route['advertise'] = 'admin/advertiseController';
$route['advertise/add'] = 'admin/advertiseController/add_advertise';
$route['advertise/edit/(:num)'] = 'admin/advertiseController/edit_advertise/$1';
$route['advertise/delete/(:num)'] = 'admin/advertiseController/delete_advertise/$1';
#=====================================================================================

$route['marquee'] = 'admin/marqueeController';
$route['marquee/add'] = 'admin/marqueeController/add_marquee';
$route['marquee/edit/(:num)'] = 'admin/marqueeController/edit_marquee/$1';
$route['marquee/delete/(:num)'] = 'admin/marqueeController/delete_marquee/$1';
#================================================================================
$route['template'] = 'admin/template_c';
$route['template/add'] = 'admin/template_c/add_template';
$route['template/edit/(:num)'] = 'admin/template_c/edit_template/$1';
$route['template/delete/(:num)'] = 'admin/template_c/delete_template/$1';
#===========================================================================
$route['slide'] = 'admin/slide_c';
$route['slide/add'] = 'admin/slide_c/add_value';
$route['slide/edit/(:num)'] = 'admin/slide_c/edit_value/$1';
$route['slide/delete/(:num)'] = 'admin/slide_c/delete/$1';

#===========================================================================

$route['Store'] = 'admin/Store_c';

#===========================================================================


$route['product'] = 'admin/product_c';


$route['order'] = 'admin/orderController';
$route['admin'] = 'admin/log_controller';
$route['logout'] = 'admin/user_controller/logout';
$route['user_controller'] = 'admin/user_controller';
$route['memberLogin'] = 'admin/memberLogin';
$route['memberLogout'] = 'admin/memberLogout';
$route['memberLogin/addAccount'] = 'admin/memberLogin/addAccount';
$route['memberLogin/addProduct'] = 'admin/memberLogin/addProduct';
$route["promotion"] = 'admin/memberlogin/add_promotion';
$route["Cancel"] = 'admin/MemberLogin/Cancel';
$route['profile/(:num)'] = 'admin/memberLogin/profile/$1';
$route['memberLogin/change_password'] = 'admin/memberLogin/change_password';
$route['profile/updateOrderStatus/(:num)/(:any)'] = 'admin/memberLogin/updateOrderStatus/$1/$2';
$route['inventory'] = 'admin/inventoryController';
$route['inventory/add'] = 'admin/inventoryController/addInventory';
$route['inventory/edit/(:num)'] = 'admin/inventoryController/editInventory/$1';
$route['inventory/delete/(:num)'] = 'admin/inventoryController/deleteInventory/$1';
$route['profile/view/(:any)'] = 'admin/memberLogin/view_order_detail/$1';
$route['contact'] = 'Home/contact';

$route['about'] = 'Home/about';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


