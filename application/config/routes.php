<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['Researcher'] = 'researcher/index';
// $route['Researcher/(:any)'] = 'researcher/view/$1';
$route['researcher/submitarticle'] = 'researcher/submitarticle';


$route['Dashboards'] = 'dashboard/index';

$route['Login'] = 'Login';
$route['Register'] = 'Register';
//
$route['Articles'] = 'Articles/index'; 
$route['Articles/(:any)'] = 'Articles/view/$1';
//Adding Article
$route['articles/newarticle'] = 'articles/newarticle';

$route['Articles/editarticle'] = 'Articles/editarticle';

//
$route['Authors'] = 'Authors/index'; 
$route['Authors/(:any)'] = 'Authors/view/$1';

//
$route['Users'] = 'users/index';
$route['Users/(:any)'] = 'users/view/$1';
//Adding User
$route['Users/newuser'] = 'users/newuser';
//Update of User
$route['users/edituser/(:num)'] = 'users/edituser/$1';
$route['users/update_user'] = 'users/update_user';
//Deletionn of User
$route['Users/delete_user'] = 'users/delete_user';


//Volume Routes
$route['Volumes'] = 'volumes/index';
$route['Volumes/(:any)'] = 'volumes/view/$1';
//Adding of New Volume
$route['Volumes/newvolume'] = 'Volumes/newvolume';
//Update of Volume
$route['volumes/editvolume/(:num)'] = 'volumes/editvolume/$1';
$route['volumes/update_volume'] = 'volumes/update_volume';
//Deletion of Volume
$route['volumes/delete_volume'] = 'volumes/delete_volume';



//
$route['ArticlesSubmitted'] = 'ArticlesSubmitted/index'; 
$route['ArticlesSubmitted/(:any)'] = 'ArticlesSubmitted/view/$1';

//
$route['default_controler'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';




// $route['articles'] = 'articles/index'; 
 
