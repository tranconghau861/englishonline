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
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|   http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|   $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|   $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|   $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|       my-controller/my-method -> my_controller/my_method
*/
$route['default_controller']                            = 'home';
$route['404_override']                                  = 'home/error';
$route['translate_uri_dashes']                          = FALSE;

$route['(\w{2})/about-us']                              = 'about/index';
$route['(\w{2})/contact']                               = 'contact/index';
$route['(\w{2})/livetv']                                = 'livetv/index';
$route['(\w{2})/livetv/(:any)']                         = 'livetv/index/$2';
$route['(\w{2})/video/ajax_more/(:any)']                = 'video/ajax_more/$2';
$route['(\w{2})/video/category/(:any)']                 = 'video/index/$2';
$route['(\w{2})/video/(:any)']                          = 'video/detail/$2';
$route['(\w{2})/alphabet']                              = 'alphabet/index';
$route['(\w{2})/alphabet/pronounce']                    = 'alphabet/pronounce';
$route['(\w{2})/alphabet/ajax_more/(:any)']             = 'alphabet/ajax_more/$2';
$route['(\w{2})/alphabet/(:any)']                       = 'alphabet/detail/$2';
$route['(\w{2})/100-lessons']                           = 'lessons/index';
$route['(\w{2})/100-lessons/(:any)']                    = 'lessons/detail/$2';
$route['(\w{2})/newss']                                 = 'newss/index';
$route['(\w{2})/newss/(:any)']                          = 'newss/detail/$2';
$route['(\w{2})/1000-most-common-phrases']              = 'noun/index';
$route['(\w{2})/1500-most-common-words']                = 'noun/index';
$route['(\w{2})/1000-most-common-phrases/(:any)']       = 'noun/index/$2';
$route['(\w{2})/1500-most-common-words/(:any)']         = 'noun/index/$2';


$route['(\w{2})/chuyen-muc-video/(:any)']               = 'video/category/$2';
$route['(\w{2})/chuyen-muc-video/(:any)/(:num)']        = 'video/category/$2/$3';
$route['(\w{2})/video/filter']                          = 'video/filter';
$route['(\w{2})/video/autocomplete']                    = 'video/autocomplete';

$route['(\w{2})/xem-truyen-hinh']                       = 'livetv/index';
$route['(\w{2})/truyen-hinh']                           = 'livetv/livevideo';
$route['(\w{2})/phat-thanh']                            = 'livetv/radio';
$route['(\w{2})/lich-phat-song']                        = 'livetv/schedule';
$route['(\w{2})/truyen-hinh-truc-tiep']                 = 'livetv/livetv_tream';
$route['(\w{2})/lich-phat-song/(:any)']                 = 'livetv/schedule/$2';
$route['(\w{2})/truyen-hinh/(:any)']                    = 'livetv/detail/$2';
$route['(\w{2})/phat-thanh/(:any)']                     = 'livetv/detail_radio/$2';
$route['(\w{2})/danh-muc-phat-thanh/(:any)']            = 'livetv/category_radio/$2';


$route['(\w{2})/(.*)']                                  = '$2';
$route['(\w{2})']                                       = $route['default_controller'];
$route['admin']                                         = 'admin/home';
