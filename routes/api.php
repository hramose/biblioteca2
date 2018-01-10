<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    //    Route::resource('task', 'TasksController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});


Route::get('search', 'FileApiController@search');
Route::resource('accommodations', 'FileApiController');


Route::get('search2', 'PerfilApiController@search');
Route::resource('perfiless', 'PerfilApiController');

Route::get('search3', 'ArchivosPerfilesApiController@search');
Route::resource('perfiless_archivoss', 'ArchivosPerfilesApiController');
