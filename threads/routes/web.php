<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;


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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', [LoginController::class, 'showLoginForm']) -> name('admin.login');
    Route::Post('/login', [LoginController::class, 'login']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/home', [HomeController::class, 'index']) -> name('admin.home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/threads', ThreadController::class)->except(['create', 'update']);
Route::resource('/threads/{thread}/messages', MessageController::class)->except(['create', 'update']);
