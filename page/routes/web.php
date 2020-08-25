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

Route::get('/', function () {
    // return "hello world";
    // return pdf
    return view('welcome');
});

Route::view('/home','home')->name('home');

Route::redirect('asd','home',301);

// /about es el nombre de la ruta
// segundo parametro será el nombre de la vista
// about.blade.php
// en el metodo name es para poder tener un alias a esa ruta
// esto nos servira para las redirecciones y para la generacion de rutas pero este alias solo esta permitido dentro de
// laravel mas no podemos ingresar a localhost:8000/alias -> localhost:8000/home
// https://www.javatpoint.com/named-routes-in-laravel


Route::view('/about','about')->name('about');

/**
 * Generating URLs
 * $url= route('about-alias');
 * Generating Redirects...
 * return redirect() -> route('about-alias');
 */

Route::get("/test",['as'=>'test.example',function(){
    $url = route('test.example');
    return "La url es ".$url;
}]);

// https://laravel.com/docs/5.1/routing
Route::get('user/{id}/profile',function($id)  {
    $url=route('profile',['id'=>100]);
    return $url;
})->name('profile');


Route::get("blog","BlogController@index")->name('blog.index');

// estos son parametros con la varaible post y slug es
Route::get("blog/{post:slug}","BlogController@show")->name('blog.show');


Route::view('/contacts','contacts')->name('contacts');
