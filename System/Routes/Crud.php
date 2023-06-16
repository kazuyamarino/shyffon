<?php
// User defined routes.
// Format :
// Route::method('url', function() {
// 		Route::goto('namespace\class_controller@method');
// });
//
// Route::method('url/@id:num', function($id) {
// 		Route::goto('namespace\class_controller@method', $id);
// });
// Route method : get|post|put|patch|delete|head|options

// Crud Route
Route::group('/crud', function () {
	// Crud Homepage
	Route::get('', [System\Modules\Crud\Controllers\Crud::class, 'crud_homepage']);
	Route::get('/(:any)', function ($message) {
		Route::goto([System\Modules\Crud\Controllers\Crud::class, 'crud_homepage'], $message);
	});

	// Insert data process
	Route::post('/insert', [System\Modules\Crud\Controllers\Crud::class, 'crud_insert']);

	// Delete data process
	Route::get('/delete/(:num)', function ($id) {
		Route::goto([System\Modules\Crud\Controllers\Crud::class, 'crud_delete'], $id);
	});
	Route::post('/multidelete', [System\Modules\Crud\Controllers\Crud::class, 'crud_multidelete']);

	// Update data process
	Route::post('/update/(:num)', function ($id) {
		Route::goto([System\Modules\Crud\Controllers\Crud::class, 'crud_update'], $id);
	});

	// fetch data for update
	Route::get('/fetch/(:num)', function ($id) {
		Route::goto([System\Modules\Crud\Controllers\Crud::class, 'crud_fetch'], $id);
	});

	// Show all data on json format
	Route::get('/data.json', [System\Modules\Crud\Controllers\Crud::class, 'crud_data']);
});
