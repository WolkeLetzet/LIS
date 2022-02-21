<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect(route('article.index'));
});

Auth::routes();
Route::get('register', function () {
    return redirect(route('article.index'));
});


Route::namespace('App\Http\Controllers')->middleware('auth')->group(function () {

    Route::get('index', 'ArticleController@index')->name('article.index');
    Route::get('article/show/{id}', 'ArticleController@show')->name('article.show');
    Route::get('user/profile','UserController@show')->name('user.profile');

    Route::post('user/profile','HomeController@guardarNombre')->name('cambiar-nombre');
    Route::get('user/setting/password/change','HomeController@showChangePassword')->name('password.change');
    Route::post('user/setting/password/change','HomeController@savePassword')->name('password.save');

    Route::group(['middleware' => ['role:admin']], function () {
        //

        Route::get('user/admin/create','UserController@create')->name('user.create');
        Route::post('user/admin/create','UserController@store')->name('user.store');

        Route::post('article/delete/{id}','ArticleController@destroy')->name('article.delete');
        Route::post('file/delete/{id}','ArticleController@fileDelete')->name('file.delete');

        Route::get('article/create', 'ArticleController@create')->name('article.create');
        Route::post('article/create', 'ArticleController@store')->name('article.create');

        Route::get('article/edit/{id}','ArticleController@edit')->name('article.edit');
        Route::post('article/edit/{id}', 'ArticleController@update')->name('article.update');
        
        Route::get('user/admin/control','AdminController@userRoleControl')->name('user.role.table');
        Route::get('user/admin/control/edit','AdminController@userRoleEdit')->name('user.role.control');
        Route::post('user/admin/control/edit','AdminController@userRoleSave')->name('user.role.save');
        Route::get('user/admin/control/delete','AdminController@showUserDelete')->name('user.admin.delete');
        Route::post('user/admin/control/delete','AdminController@userDelete')->name('user.admin.delete');
        

    });
});

Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');



Route::get('error',function(){
    return view('error.noToken');
})->name('error');


Route::view('test','test');
