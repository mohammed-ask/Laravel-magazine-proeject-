<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\signupcontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\logoutcontroller;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\singlecontroller;

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

Route::get('/',[homecontroller::class,'index'] );
Route::get('/single', [singlecontroller::class,'index'] );
Route::get('/single/{slag}', [singlecontroller::class,'index'] );

Route::get('/login', [logincontroller::class,'index'] )->name("login");

Route::get('register',[signupcontroller::class,'index'] )->middleware("auth");

Route::get('logout', [logoutcontroller::class,"logout"]);

Route::post('/login',[logincontroller::class,"save"]);
Route::post('/register',[signupcontroller::class,"save"]);

Route::get('/admin',[admincontroller::class,"index"])->middleware("auth");
Route::get('/admin/posts/',[admincontroller::class,"Posts"])->middleware("auth");

Route::get('/admin/posts/{type}',[admincontroller::class,"Posts"])->middleware("auth");
Route::post('/admin/posts/{type}',[admincontroller::class,"Posts"])->middleware("auth");

Route::get('/admin/posts/{type}/{id}',[admincontroller::class,"Posts"])->middleware("auth");
Route::post('/admin/posts/{type}/{id}',[admincontroller::class,"Posts"])->middleware("auth");

Route::get('/admin/categories',[admincontroller::class,"Categories"])->middleware("auth");

Route::get('/admin/categories/{type}',[admincontroller::class,"categories"])->middleware("auth");
Route::post('/admin/categories/{type}',[admincontroller::class,"categories"])->middleware("auth");

Route::get('/admin/categories/{type}/{id}',[admincontroller::class,"categories"])->middleware("auth");
Route::post('/admin/categories/{type}/{id}',[admincontroller::class,"categories"])->middleware("auth");

Route::get('/admin/users',[admincontroller::class,"Users"])->middleware("auth");

Route::get('/admin/users/{type}',[admincontroller::class,"Users"])->middleware("auth");
Route::post('/admin/users/{type}',[admincontroller::class,"Users"])->middleware("auth");

Route::get('/admin/users/{type}/{id}',[admincontroller::class,"Users"])->middleware("auth");
Route::post('/admin/users/{type}/{id}',[admincontroller::class,"Users"])->middleware("auth");

