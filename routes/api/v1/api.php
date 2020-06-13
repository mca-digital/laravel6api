<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Contacts
// Route::resource('contacts','ContactController');

// Users
Route::prefix('/user')->group(function(){
	Route::post('/login','api\v1\LoginController@login');
	Route::middleware('auth:api')->get('/all','api\v1\user\UserController@index');
});

Route::middleware('auth:api')->resource('contacts','ContactController');
