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
$route['default_controller'] 			= 'welcome';
$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;
/*=======================================Admin Panel=================================================*/

$route['admin'] 					    = 'admin/Auth';
$route['admin/dashboard'] 				= 'admin/Dashboard/dashboardPage';
$route['admin/admin-profile'] 			= 'admin/Auth/admin_profile';

$route['admin/clients-list'] 			= 'admin/Users/userList'; 
$route['admin/edit-cleint/(:num)'] 		= 'admin/Users/edit_Client/$1';

$route['admin/questiontList'] 			= 'admin/Questions/questionList';
$route['admin/addQuestion'] 			= 'admin/Questions/addQuestion';
$route['admin/edit-question/(:num)'] 	= 'admin/Questions/edit_question/$1';



$route['admin/articles-List'] 			= 'admin/Articles/articles_listing';
$route['admin/add-article'] 			= 'admin/Articles/add_article';
$route['admin/edit-article/(:num)'] 	= 'admin/Articles/edit_article/$1';

$route['admin/book-list'] 				= 'admin/Books/book_listing';
$route['admin/add-book'] 				= 'admin/Books/add_book';
$route['admin/edit-book/(:num)'] 		= 'admin/Books/edit_book/$1';