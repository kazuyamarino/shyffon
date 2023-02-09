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
Route::get('/hmvc', 'Homepage\Hello@index_hmvc');

// Crud Route
Route::group('/crud', function() {
	// Crud Homepage
	Route::get('', 'Crud\Crud@crud_homepage');
	Route::get('/(:any)', function($message) {
		Route::goto('Crud\Crud@crud_homepage', $message);
	});

	// Insert data process
	Route::post('/insert', 'Crud\Crud@crud_insert');

	// Delete data process
	Route::get('/delete/(:num)', function($id) {
		Route::goto('Crud\Crud@crud_delete', $id);
	});
	Route::post('/multidelete', 'Crud\Crud@crud_multidelete');

	// Update data process
	Route::post('/update/(:num)', function($id) {
		Route::goto('Crud\Crud@crud_update', $id);
	});

	// fetch data for update
	Route::get('/fetch/(:num)', function($id) {
		Route::goto('Crud\Crud@crud_fetch', $id);
	});

	// Show all data on json format
	Route::get('/data.json', 'Crud\Crud@crud_data');
});
