<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::prefix('api')->group(function(){
   
    Route::prefix('auth')->group(function(){
        // Register Path
        Route::post('register', [
            'uses'  =>  'Auth\RegisterController@register'
        ]);

        // Login Path
        Route::post('login', [
            'uses' => 'Auth\LoginController@login'
        ]);
    });

    // Executives path
    Route::get('executives', [
        'uses'  =>  'Executives\ExecutivesController@getAll',
        'middleware' => 'jwt.auth'
    ]);

    // Leadd path
    Route::get('leads', [
        'uses'  =>  'Leads\LeadsController@getAll'
    ]);
    
    // All tables path
    Route::get('tables', [
        'uses'  =>  'Tables\TablesController@getAll',
        'middleware' => 'jwt.auth'
    ]);

    // Table path
    Route::get('table/{table}', [
        'uses'  =>  'Tables\TablesController@getInfoTable',
        'middleware' => 'jwt.auth'
    ]);
});