<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['jwt.auth', 'api-header']], function () {
    Route::resource('/companies', 'Api\CompaniesController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('/employees', 'Api\EmployeesController', ['only' => ['index', 'create' , 'store', 'show', 'update', 'destroy']]);
    Route::post('me', 'Api\AuthController@me');
    Route::post('refresh', 'Api\AuthController@refresh');
});
Route::group(['middleware' => 'api-header'], function () {
    Route::post('user/login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
});

