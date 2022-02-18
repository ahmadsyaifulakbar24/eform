<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\Param\ParamController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('auth/login', LoginController::class);

Route::controller(ParamController::class)->group(function () {
    Route::get('params/business_activity', 'get_business_activity');
    Route::get('params/business_fields', 'get_business_fields');
    Route::get('params/business_type', 'get_business_type');
    Route::get('params/image_plut', 'get_image_plut');
    Route::get('params/industry', 'get_industry');
});

Route::middleware('auth:api')->group(function() {
    Route::get('auth/user', UserController::class);
    Route::post('auth/logout', LogoutController::class);
});
