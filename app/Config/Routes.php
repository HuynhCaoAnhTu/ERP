<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
$routes->get('/', 'HomeController::index', ['filter' => 'authGuard']);
$routes->get('/signin', 'SigninController::index');
$routes->get('/logout', 'SigninController::logout');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/home', 'HomeController::index', ['filter' => 'authGuard']);
$routes->get('/profile', 'ProfileController::index', ['filter' => 'authGuard']);
$routes->post('/lang', 'HomeController::setlang', ['filter' => 'authGuard']);
$routes->get('/lang', 'HomeController::setlang', ['filter' => 'authGuard']);


$routes->get('/file-upload', 'FilesController::index');
$routes->post('/multiple-file-upload', 'FilesController::multipleUpload');

$routes->get('/products', 'Product\ProductViewController::index', ['filter' => 'authGuard']);
$routes->post('/products/getAll', 'Product\ProductViewController::getAll', ['filter' => 'authGuard']);
$routes->get('/products/outbound', 'Product\OnsalesView::outbound', ['filter' => 'authGuard']);

$routes->group('product', ['filter' => 'authGuard'], function ($routes) {
	$routes->addPlaceholder('lang', '[a-z]{2}');
	$routes->get('add_new', 'Product\ProductAdminController::add_product/vi');
	$routes->get('add_new/(:lang)', 'Product\ProductAdminController::add_product/$1/0');
	$routes->get('add_new/(:lang)/(:any)', 'Product\ProductAdminController::addNew/$1/$2');
	$routes->post('saveProduct', 'Product\ProductAdminController::saveProduct');
	$routes->post('addProduct', 'Product\ProductAdminController::addProduct');

	$routes->get('edit/(:num)', 'Product\ProductAdminController::edit_product/$1');


	$routes->post('getData', 'Product\ProductAdminController::getData');
	$routes->get('choosefile', 'Product\ProductAdminController::getAllFile');
	$routes->post('choosedfile', 'Product\ProductAdminController::getChoosedFile');



	//	$routes->get('add_translate/(:sup)/(:any)', 'Product\ProductAdminController::add/$1/$2');
	//	$routes->get('add_translate/(:sup)/(:any)', 'Product\ProductAdminController::add/$1/$2');
	//ONSLAES
	//$routes->get('getOnsales', 'Product\ProductOnsalesController::getOnSales');
	$routes->post('getOnsales', 'Product\ProductOnsalesController::getOnSales');

	$routes->get('listOnSales', 'Product\ProductOnsalesController::listOnSales');
	$routes->post('listOnSales', 'Product\ProductOnsalesController::listOnSales');

	$routes->post('getOnsalesForm', 'Product\ProductOnsalesController::getForm');
	$routes->get('getOnsalesForm', 'Product\ProductOnsalesController::getForm');

	$routes->get('getTempOnsalesForm', 'Product\ProductOnsalesController::getOnsaleForm');
	$routes->post('getTempOnsalesForm', 'Product\ProductOnsalesController::getOnsaleForm');

	$routes->post('saveOnsales', 'Product\ProductOnsalesController::saveOnsales');
	$routes->get('saveOnsales', 'Product\ProductOnsalesController::saveOnsales');

	$routes->post('updateOnsales', 'Product\ProductOnsalesController::updateOnsales');
	$routes->get('updateOnsales', 'Product\ProductOnsalesController::updateOnsales');
	$routes->get('getPricesTemp', 'Product\ProductOnsalesController::getPricesTemp');
	$routes->post('getPricesTemp', 'Product\ProductOnsalesController::getPricesTemp');
	$routes->get('getBlackoutsTemp', 'Product\ProductOnsalesController::getBlackoutsTemp');
	$routes->post('getBlackoutsTemp', 'Product\ProductOnsalesController::getBlackoutsTemp');
	$routes->get('viewFullProduct/(:num)', 'Product\ProductAdminController::viewFullProduct/$1');
	$routes->post('loadPacket', 'Product\ProductAdminController::loadPacket');

	//	$routes->get('(:any)','Product\ProductController::index/$1');
	//	$routes->post('getAll', 'Product\ProductController::getAll');
	//	$routes->post('getOne', 'Product\ProductController::getOne');
	//	$routes->post('add', 'Product\ProductController::add');
	//	$routes->post('edit', 'Product\ProductController::edit');
	//	$routes->post('remove', 'Product\ProductController::remove');
	//	$routes->get('getAll', 'Product\ProductController::getAll');
});


$routes->group('category', ['filter' => 'authGuard'], function ($routes) {
	$routes->get('location', 'Category\Location::index');
	$routes->get('location/(:any)', 'Category\Location::index/$1');
	$routes->post('location/getAll', 'Category\Location::getAll');
	$routes->post('location/getOne', 'Category\Location::getOne');
	$routes->post('location/add', 'Category\Location::add');
	$routes->post('location/edit', 'Category\Location::edit');
	$routes->post('location/remove', 'Category\Location::remove');
});
$routes->group('scm', ['filter' => 'authGuard'], function ($routes) {

	$routes->addPlaceholder('sup', '[a-z]{2}');
	$routes->get('(:sup)', 'SCMController::index/$1');
	$routes->get('(:sup)/getAll', 'SCMController::getAll/$1');
	$routes->post('(:sup)/getAll', 'SCMController::getAll/$1');
	$routes->post('(:sup)/getOne', 'SCMController::getOne/$1');
	$routes->post('(:sup)/add', 'SCMController::add/$1');
	$routes->post('(:sup)/edit', 'SCMController::edit/$1');
	$routes->post('(:sup)/remove', 'SCMController::remove/$1');
	$routes->get('(:sup)/add', 'SCMController::add/$1');
});
$routes->group('customers', ['filter' => 'authGuard'], function ($routes) {
	$routes->get('', 'CRMController::index/$1');
	$routes->get('getAll', 'CRMController::getAll');
	$routes->post('getAll', 'CRMController::getAll');
	$routes->post('getOne', 'CRMController::getOne');
	$routes->get('getOne', 'CRMController::getOne');
	$routes->post('add', 'CRMController::add');
	$routes->post('edit', 'CRMController::edit');
	$routes->post('remove', 'CRMController::remove');
});
$routes->group('b2b', ['filter' => 'authGuard'], function ($routes) {

	$routes->addPlaceholder('ag', '[a-z]{2}');
	$routes->get('(:ag)', 'SCMController::index/$1');
	$routes->post('(:ag)/getAll', 'SCMController::getAll/$1');
	$routes->post('(:ag)/getOne', 'SCMController::getOne/$1');
	$routes->post('(:ag)/add', 'SCMController::add/$1');
	$routes->post('(:ag)/edit', 'SCMController::edit/$1');
	$routes->post('(:ag)/remove', 'SCMController::remove/$1');
});

$routes->get('upload', 'ImageUploadController::index');
$routes->group('images', ['filter' => 'authGuard'], function ($routes) {
	$routes->post('getAll', 'ImageUploadController::getAll');
	$routes->get('getAll', 'ImageUploadController::getAll');
	$routes->get('getData', 'ImageUploadController::getData');
	$routes->post('getOne', 'ImageUploadController::getOne');
	$routes->get('getOne', 'ImageUploadController::getOne');
	$routes->post('add', 'ImageUploadController::add');
	$routes->post('edit', 'ImageUploadController::edit');
	$routes->post('remove', 'ImageUploadController::remove');
});

$routes->post('images/upload', 'ImageUploadController::upload');



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
