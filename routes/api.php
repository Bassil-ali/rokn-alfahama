<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;

use App\Http\Controllers\ResetPasswordController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
$controllers = require base_path('vendor/composer/autoload_classmap.php');
$controllers = array_keys($controllers);
$controllers = array_filter($controllers, function ($controller) {
    return (strpos($controller, 'Controllers') !== false) && strlen($controller) > 0 && strpos($controller, 'Base') == false && strpos($controller, 'Auth') == false && strpos($controller, 'App') >= 0;
});
array_map(function ($controller) {
    if (method_exists($controller, 'routeName'))
        Route::apiResource($controller::routeName(), $controller);
}, $controllers);

Route::group([
    'prefix' => 'auth',
    'middleware' => 'api',
    'as' => 'auth.'
], function () {
    $auth_routes = ['login', 'me', 'logout', 'refresh'];
    foreach ($auth_routes as $auth_route) {
        Route::post("/" . $auth_route, [AuthController::class, $auth_route])->name($auth_route);
    }
    Route::get("user", [AuthController::class, 'user']);
});



Route::post('/send-reset-link', [ResetPasswordController::class, 'sendEmail']);
Route::post('/reset-password', [ChangePasswordController::class, 'passwordResetProcess']);
