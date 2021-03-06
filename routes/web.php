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

// Route::get('/', 'Home\PagesController@root')->name('root');
Route::get('/', 'TopicsController@index')->name('root');
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// 用户身份验证相关的路由
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 用户注册相关路由
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 密码重置相关路由
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email 认证相关路由
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//用户相关
Route::resource('users', 'Home\UsersController', ['only' => ['show', 'update', 'edit']]);

//话题相关
Route::resource('topics', 'TopicsController', ['only' => ['index',  'create', 'store', 'update', 'edit', 'destroy']]);

Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
//上传图片
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');

//分类
Route::resource('categories', 'Home\CategoriesController', ['only' => ['show']]);

//回复
Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);

//消息
Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);

// 无权限访问后台页面
Route::get('permission-denied', 'Home\PagesController@permissionDenied')->name('permission-denied');
