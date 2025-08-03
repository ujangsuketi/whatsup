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

Route::group([
    'middleware' => ['web', 'impersonate'],
    'namespace' => 'Modules\Themes\Http\Controllers'
], function () {
    //Themes reset
    Route::get('/themes/reset', 'Main@reset')->name('themes.reset');

    Route::group([
        'middleware' => ['verified', 'web', 'auth', 'impersonate', 'XssSanitizer', 'isOwnerOnPro'],
    ], function () {
        //Force reload
        Route::get('/themes', 'Main@index')->name('themes.index');
    });
});