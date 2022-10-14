<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/blog-details/{id}', 'HomeController@details')->name('blog.details');


    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth', 'permission']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');

        });

        /**
         * User Routes
         */
        Route::group(['prefix' => 'blogs'], function() {
            Route::get('/', 'BlogsController@index')->name('blogs.index');
            Route::get('/create', 'BlogsController@create')->name('blogs.create');
            Route::post('/create', 'BlogsController@store')->name('blogs.store');
            Route::get('/{blog}/show', 'BlogsController@show')->name('blogs.show');
            Route::get('/{blog}/edit', 'BlogsController@edit')->name('blogs.edit');
            Route::patch('/{blog}/update', 'BlogsController@update')->name('blogs.update');
            Route::delete('/{blog}/delete', 'BlogsController@destroy')->name('blogs.destroy');
            Route::get('/{blog}/detail', 'BlogsController@blogauthdetails')->name('blogs.detail');
            Route::get('/{id}/inactive', 'BlogsController@inactive')->name('inactive.blog');
            Route::get('/{id}/active', 'BlogsController@active')->name('active.blog');


        });

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });



    Route::controller(CommentController::class)->group(function (){

        Route::get('/comments', 'CommentIndex')->name('comments.index');
        Route::post('/store/comment', 'StoreComment')->name('store.comment');
        Route::get('/inactive/{id}', 'CommentInactive')->name('inactive.comment');
        Route::get('/active/{id}', 'CommentActive')->name('comment.active');
        Route::get('/delete/{id}', 'CommentDelete')->name('comment.delete');
    });
});


