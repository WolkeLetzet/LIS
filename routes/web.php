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

        Route::get('user/admin/roles/edit/{id}','AdminController@userRoleEdit')->name('user.roles.edit');
        Route::post('user/admin/roles/update/{id}','AdminController@userRoleUpdate')->name('user.roles.update');

        Route::get('user/admin/control/delete','AdminController@showUserDelete')->name('user.admin.delete');
        Route::post('user/admin/control/delete','AdminController@userDelete')->name('user.admin.delete');

        Route::get('user/admin/cursos','CursoController@index')->name('user.cursos');
        Route::get('user/admin/cursos/edit/{id}','CursoController@edit')->name('user.cursos.edit');
        Route::put('user/admin/cursos/update/{id}','CursoController@update')->name('user.cursos.update');


    });
});

Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');



Route::get('error',function(){
    return view('error.noToken');
})->name('error');


//Route::get('test','App\Http\Controllers\AdminController@test');
