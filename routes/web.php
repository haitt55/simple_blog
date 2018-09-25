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

Route::prefix('admin')->group(function() {
    Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Auth\AdminLoginController@login')->name('admin.login.post');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/home', 'AdminController@index')->name('admin.home');
});

Route::group(array('middleware' => 'auth:admin', 'as' => 'admin.'), function()
{
    Route::resource('admin/posts', 'AdminPostController');
});

Route::group(array('middleware' => 'auth'), function()
{
    Route::resources([
        'posts' => 'PostController'
    ]);
    Route::put('/posts/{post}', 'PostController@update')->name('posts.update');
});
Route::get('/posts/detail/{post}', 'PostController@detail')->name('posts.detail');

Route::get('/', 'HomeController@index')->name('index');

Route::get('/home', 'HomeController@home')->name('home');

Auth::routes();

