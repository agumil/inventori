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
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

$route['user/add']['get'] = 'user/display_add';
$route['user/add/save']['post'] = 'user/store';
$route['user/(:num)']['get'] = 'user/display_edit/$1';
$route['user/(:num)/save']['post'] = 'user/update/$1';
$route['user/(:num)/delete']['post'] = 'user/delete/$1';

$route['inventory/add']['get'] = 'inventory/display_add';
$route['inventory/add/save']['post'] = 'inventory/store';
$route['inventory/(:num)']['get'] = 'inventory/display_edit/$1';
$route['inventory/(:num)/save']['post'] = 'inventory/update/$1';
$route['inventory/(:num)/delete']['post'] = 'inventory/delete/$1';

$route['brand/add']['get'] = 'brand/display_add';
$route['brand/add/save']['post'] = 'brand/store';
$route['brand/(:num)']['get'] = 'brand/display_edit/$1';
$route['brand/(:num)/save']['post'] = 'brand/update/$1';
$route['brand/(:num)/delete']['post'] = 'brand/delete/$1';

$route['color/add']['get'] = 'color/display_add';
$route['color/add/save']['post'] = 'color/store';
$route['color/(:num)']['get'] = 'color/display_edit/$1';
$route['color/(:num)/save']['post'] = 'color/update/$1';
$route['color/(:num)/delete']['post'] = 'color/delete/$1';

$route['material/add']['get'] = 'material/display_add';
$route['material/add/save']['post'] = 'material/store';
$route['material/(:num)']['get'] = 'material/display_edit/$1';
$route['material/(:num)/save']['post'] = 'material/update/$1';
$route['material/(:num)/delete']['post'] = 'material/delete/$1';

$route['measurement/add']['get'] = 'measurement/display_add';
$route['measurement/add/save']['post'] = 'measurement/store';
$route['measurement/(:num)']['get'] = 'measurement/display_edit/$1';
$route['measurement/(:num)/save']['post'] = 'measurement/update/$1';
$route['measurement/(:num)/delete']['post'] = 'measurement/delete/$1';

$route['incominggood/add']['get'] = 'incominggood/display_add';
$route['incominggood/add/save']['post'] = 'incominggood/store';
$route['incominggood/(:num)']['get'] = 'incominggood/display_edit/$1';
$route['incominggood/(:num)/save']['post'] = 'incominggood/update/$1';
$route['incominggood/(:num)/delete']['post'] = 'incominggood/delete/$1';

$route['outgoinggood/add']['get'] = 'outgoinggood/display_add';
$route['outgoinggood/add/save']['post'] = 'outgoinggood/store';
$route['outgoinggood/(:num)']['get'] = 'outgoinggood/display_edit/$1';
$route['outgoinggood/(:num)/save']['post'] = 'outgoinggood/update/$1';
$route['outgoinggood/(:num)/delete']['post'] = 'outgoinggood/delete/$1';
