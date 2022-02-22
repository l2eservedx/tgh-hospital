<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SexController;
use App\Http\Controllers\userController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ViewUserController;

use App\Http\Controllers\GobackController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();




Route::middleware(['auth'])->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('home',userController::class);
    Route::resource('/',userController::class);
  });

//Route::resource('admin/home',SexController::class);

Route::resource('goback',GobackController::class);

Route::middleware(['auth'])->group(function(){
    Route::get('admin/home',[HomeController::class,'adminHome'])->name('admin.home')->middleware('level');
    Route::resource('admin/home',PatientController::class)->middleware('level');
    Route::resource('posts',PatientController::class)->middleware('level');
    Route::resource('userview',ViewUserController::class)->middleware('level');
  });