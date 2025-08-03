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

Route::prefix('wpboxlanding')->group(function() {
    Route::get('/', 'WpboxlandingController@index');
});

Route::group([
        'middleware' =>[ 'web','impersonate'],
        'namespace' => 'Modules\Wpboxlanding\Http\Controllers'
    ], function () {
        Route::group([
            'middleware' =>[ 'web'],
        ], function () {
            //Blog Management
            Route::get('blog', 'Main@blog');

            Route::get('blog/{slug}', 'Main@blog_post');
        });
    });