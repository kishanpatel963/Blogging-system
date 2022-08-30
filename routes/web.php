<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/getDetailedPost/{id}','HomeController@detailedBlogPost')->name('detailedPost');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/getRegister', 'Auth\RegisterController@show')->name('getRegisterPage');
        Route::post('/register', 'Auth\RegisterController@register')->name('register');

        /**
         * Login Routes
         */
        Route::get('/getLogin', 'Auth\LoginController@show')->name('getLoginPage');
        Route::post('/login', 'Auth\LoginController@login')->name('login');
    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'Auth\LoginController@logOut')->name('logout');

        /**
         * Blog Post Routes
        */
        Route::get('/blog-index','BlogController@index')->name('blogIndex');
        Route::get('/blog-create','BlogController@create')->name('createBlog');
        Route::post('/blog-store','BlogController@store')->name('storeBlog');
        Route::group(['middleware' => ['isAdmin']],function () {
            /**
             * Admin Routes
            */
            Route::get('/blog-edit/{id}','BlogController@edit')->name('editBlog');
            Route::put('/blog-update/{id}','BlogController@update')->name('updateBlog');
            Route::delete('/blog-delete/{id}','BlogController@destroy')->name('deleteBlog');
        });
    });

});
