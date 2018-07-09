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

$router->get('/', function () {
    return view('welcome');
});

// Auth::routes();
$router->namespace('Auth')->group(function ($router) {
    $router->get('login', 'LoginController@showLoginForm')->name('login');
    $router->post('login', 'LoginController@login');
    $router->post('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    $router->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $router->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $router->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $router->post('password/reset', 'ResetPasswordController@reset');
});

$router->middleware('access.active')
       ->group(function ($router) {
           $router->get('/home', 'HomeController@index')->name('home');

           $router->resource('users', 'UsersController')->except('show');
           $router->resource('rewards', 'RewardsController')->except('show');
           $router->resource('activities', 'ActivitiesController')->except('show');
       });
