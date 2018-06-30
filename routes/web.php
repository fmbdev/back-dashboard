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

    // Executive by id path
    Route::get('executives/{id}', [
        'uses'  =>  'Executives\ExecutivesController@getExecutiveById',
        'middleware' => 'jwt.auth'
    ]);

    // All tables path
    Route::get('tables', [
        'uses'  =>  'Tables\TablesController@getAll',
        'middleware' => 'jwt.auth'
    ]);

    // Table path
    Route::get('infotable/{table}', [
        'uses'  =>  'Tables\TablesController@getInfoTable',
        'middleware' => 'jwt.auth'
    ]);

    // Register table by id path
    Route::get('registertable/{table}/{registerid}', [
        'uses'  =>  'Tables\TablesController@getRegisterTable',
    ]);

    // Table fields path
    Route::get('fieldstable/{table}', [
        'uses'  =>  'Tables\TablesController@getTableFields',
        'middleware' => 'jwt.auth'
    ]);

    // Update register table path
    Route::post('updatetables', [
        'uses'  =>  'Tables\TablesController@updateRegister',
        'middleware' => 'jwt.auth'
    ]);

    // Leads path
    Route::get('leads', [
        'uses'  =>  'Leads\LeadsController@getAll',
        'middleware' => 'jwt.auth'
    ]);

    // Lead by id path
    Route::get('leads/{id}', [
        'uses'  =>  'Leads\LeadsController@getRegisterLead',
        'middleware' => 'jwt.auth'
    ]);

    // Permissions path
    Route::post('permissions', [
        'uses'  =>  'Permissions\PermissionsController@setPermissions',
        'middleware' => 'jwt.auth'
    ]);

    // Executive permissions path
    Route::get('permissions/{id}', [
        'uses'  =>  'Permissions\PermissionsController@getExecutivePermissions',
        'middleware' => 'jwt.auth'
    ]);

    // Delete executive permission path
    Route::get('deletepermission/{id}', [
        'uses'  =>  'Permissions\PermissionsController@deleteExecutivePermission',
        'middleware' => 'jwt.auth'
    ]);
});