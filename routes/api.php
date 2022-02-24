<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\Auth\UserController;
use App\Http\Controllers\API\BusinessForm\BusinessFormController;
use App\Http\Controllers\API\Param\ParamController;
use App\Http\Controllers\API\Region\RegionController;
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

Route::post('auth/login', LoginController::class);

Route::controller(ParamController::class)->group(function () {
    Route::get('params/business_activity', 'get_business_activity');
    Route::get('params/business_fields', 'get_business_fields');
    Route::get('params/business_type', 'get_business_type');
    Route::get('params/image_plut', 'get_image_plut');
    Route::get('params/industry', 'get_industry');
});

Route::controller(RegionController::class)->group(function () {
    Route::get('region/province', 'province');
    Route::get('region/city', 'city');
});

Route::controller(BusinessFormController::class)->group(function() {
    Route::post('business_form/create', 'create');
});

Route::middleware('auth:api')->group(function() {
    Route::get('auth/user', UserController::class);
    Route::delete('auth/logout', LogoutController::class);

    Route::controller(BusinessFormController::class)->group(function() {
        Route::get('business_form', 'get');
        Route::get('business_form/{business_form:id}', 'show');
        Route::get('business_form/total/all', 'total_all');
        Route::get('business_form/total/province', 'total_by_province');
        Route::get('business_form/total/business_type', 'total_by_business_type');
        Route::get('business_form/total/business_fields', 'total_by_business_fields');
        Route::get('business_form/total/industry', 'total_by_industry');
        Route::get('business_form/total/annual_turnover', 'total_by_annual_turnover');
    });
});
