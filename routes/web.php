<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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

Route::get('/complete-order/{id?}', function () {
    // App::setLocale('ar');
    return view('checkout');
});

Route::post('/complete-payment/{id?}',[PaymentController::class,
 'createAnAcceptPaymentTransaction']
);

Route::get('/dashboard/{any1?}', function () {
    header('content-type:text/html');
    header('Cache-Control:no-cache, no-store, must-revalidate');
    header('Pragma:no-cache');
    header('Expires:0');
    return view('dashboard');
})->where('any1', '.+');
Route::get('/{any?}', function () {
    header('content-type:text/html');
    header('Cache-Control:no-cache, no-store, must-revalidate');
    header('Pragma:no-cache');
    header('Expires:0');
    return view('home');
})->where('any', '.+');
