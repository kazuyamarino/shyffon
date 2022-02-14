<?php
use System\Middlewares\BeforeLayer;
use System\Middlewares\AfterLayer;

// define Web Routes.
// Format :
// Route::method('url', function() {
// 		Route::goto('namespace\class_controller@method');
// });
//
// Route::method('url/@id:num', function($id) {
// 		Route::goto('namespace\class_controller@method', $id);
// });
// Route method : any|get|post|put|patch|delete|head|options

// MVC Route
Route::get('/', function() {
	$middleware = [
		new BeforeLayer(),
        new AfterLayer()
    ];

	Route::middleware($middleware)->for('Welcome@index');
});

// HMVC Route
Route::get('/hmvc', function() {
	Route::goto('Homepage\Hello@index_hmvc');
});

// Crud Route
Route::group('/crud', function() {
	Route::get('', function() {
		Route::goto('Crud\Crud@crud_homepage');
	});
	Route::get('/(:any)', function($message) {
		Route::goto('Crud\Crud@crud_homepage', $message);
	});
	Route::post('/insert', function() {
		Route::goto('Crud\Crud@crud_insert');
	});
	Route::get('/delete/(:num)', function($id) {
		Route::goto('Crud\Crud@crud_delete', $id);
	});
	Route::post('/multidelete', function() {
		Route::goto('Crud\Crud@crud_multidelete');
	});
	Route::post('/update/(:num)', function($id) {
		Route::goto('Crud\Crud@crud_update', $id);
	});
	Route::get('/fetch/(:num)', function($id) {
		Route::goto('Crud\Crud@crud_fetch', $id);
	});
	Route::get('/data.json', function() {
		Route::goto('Crud\Crud@crud_data');
	});
});
