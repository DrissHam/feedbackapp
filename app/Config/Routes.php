<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Message');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('test', 'Pro::test');
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], '/message/submit/(:num)', 'Home::createMessage/$1');
$routes->match(['get', 'post'], '/compagny/submit', 'Pro::createCompagny');
$routes->match(['get', 'post'], '/compagny/login', 'Pro::loginCompagny');
$routes->get('/logout', 'Pro::logoutCompagny');

//$routes->get('/admin/all_compagnys','Pro::adminCompagnys');
//$routes->get('/admin/list_all_messages/(:num)','Pro::adminMessages/$1');
//$routes->match(['get','post'], 'admin/delete/(:num)', 'Pro::adminDeleteCompagny/$1');


$routes->match(['get', 'post'], '/admin/login', 'Admin::loginAdmin');
$routes->get('/admin/all_compagnys','Admin::adminCompagnys');
$routes->get('/admin/list_all_messages/(:num)','Admin::adminMessages/$1');
$routes->match(['get','post'], 'admin/delete/(:num)', 'Admin::adminDeleteCompagny/$1');
$routes->get('/admin/admin_dashboard', 'Admin::adminDashboard');





$routes->get('/pro/touslesmessages', 'Pro::afficherTouslesmessages');
$routes->get('/pro/comptertouslesmessages', 'Pro::compterTouslesMessages');

$routes->get('/pro/affichertouteslescompagnys', 'Pro::afficherToutesLesCompagnys');


//$routes->match(['get', 'post'], '/formulaire_test', 'Home::create');

$routes->get('/search/(:num)', 'Home::search/$1');
$routes->post('/search', 'Home::searchName');
$routes->get('/search/list', 'Home::list');
//$routes->match(['get', 'post'],'/search/(:alphanum)' ,'Home::search/$1');

$routes->get('/pro', 'Pro::index');
$routes->get('/pro/dashboard', 'Pro::dashboard');
$routes->get('/pro/messages/new', 'Pro::new_messages');
$routes->get('/pro/messages/treat', 'Pro::to_treat_messages');
$routes->get('/pro/messages/archived', 'Pro::archived_messages');
$routes->get('/pro/messages/all', 'Pro::all_messages');
$routes->get('/pro/messages/new/update/(:num)', 'Pro::update/$1');
$routes->get('/pro/messages/treat/update/(:num)', 'Pro::update/$1');
$routes->get('/pro/messages/archived/update/(:num)', 'Pro::update/$1');
$routes->get('/pro/messages/all/update/(:num)', 'Pro::update/$1');


$routes->get('/pro/profile', 'Pro::profile');
$routes->post('/pro/profile/update', 'Pro::updateProfile');
$routes->post('/pro/profile/updateAvatar', 'Pro::updateProfileAvatar');

$routes->post('/pro/profile/updatePassword', 'Pro::updatePassword');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
