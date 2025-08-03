<?php

use Illuminate\Support\Facades\Route;
use Modules\StripehSubscribe\Http\Controllers\Main;
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

Route::prefix('stripeh-subscribe')->middleware(['web'])->group(function() {
    Route::post('webhook/subscription/stripe', [Main::class, 'webhook'])->name('stripehosted.webhook');
    Route::get('/getSubscriptionLink/{plan_id}', [Main::class, 'getSubscriptionLink'])->name('stripehosted.getSubscriptionLink');
});

