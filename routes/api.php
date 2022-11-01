<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'jwt.auth'], function () {
    Route::group(['namespace' => 'Gender', 'prefix' => 'genders'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
        Route::get('/{gender}', 'ShowController');
        Route::patch('/{gender}', 'UpdateController');
        Route::delete('/{gender}/', 'DestroyController');
    });
    Route::group(['namespace' => 'Brand', 'prefix' => 'brands'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
        Route::get('/{brand}', 'ShowController');
        Route::patch('/{brand}', 'UpdateController');
        Route::delete('/{brand}/', 'DestroyController');
    });
    Route::group(['namespace' => 'Color', 'prefix' => 'colors'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
        Route::get('/{color}', 'ShowController');
        Route::patch('/{color}', 'UpdateController');
        Route::delete('/{color}/', 'DestroyController');
    });
    Route::group(['namespace' => 'CatSize', 'prefix' => 'cat_sizes'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
        Route::get('/{catSize}', 'ShowController');
        Route::patch('/{catSize}', 'UpdateController');
        Route::delete('/{catSize}/', 'DestroyController');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
        Route::get('/{category}', 'ShowController');
        Route::patch('/{category}', 'UpdateController');
        Route::delete('/{category}/', 'DestroyController');
    });
    Route::group(['namespace' => 'Size', 'prefix' => 'sizes'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
        Route::get('/{size}', 'ShowController');
        Route::patch('/{size}', 'UpdateController');
        Route::delete('/{size}/', 'DestroyController');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
        Route::get('/{user}', 'ShowController');
        Route::patch('/{user}', 'UpdateController');
        Route::delete('/{user}/', 'DestroyController');
    });
    Route::group(['namespace' => 'Clothing', 'prefix' => 'clothes'], function () {
        Route::get('/', 'IndexController');
        Route::post('/', 'StoreController');
        Route::get('/{clothing}', 'ShowController');
        Route::patch('/{clothing}', 'UpdateController');
        Route::delete('/{clothing}/', 'DestroyController');
    });
});
