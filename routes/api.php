<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['jwt.auth', 'api-header']], function () {
    Route::resource('companies' , 'Api\CompaniesController');
    Route::resource('employees' , 'Api\EmployeesController');
});
Route::group(['middleware' => 'api-header'], function () {
    Route::post('user/login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me');
});

