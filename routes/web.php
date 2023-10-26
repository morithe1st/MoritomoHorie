<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Models\Item;

use Model\User;

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/', [App\Http\Controllers\AccountController::class,'index'])->name('home');

// Gate設定
// 利用者ユーザーのみ
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home/list', [App\Http\Controllers\HomeController::class, 'list'])->name('home.list');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name("home");
    Route::get('/home/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name("home.show");

});

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/store', [App\Http\Controllers\ItemController::class, 'store']);
    Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::post('/item/update', [App\Http\Controllers\ItemController::class, 'update']);
    Route::get('/item/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete']);
});

// 管理者ユーザーのみ
Route::group(['middleware' => ['auth', 'can:admin']], function() {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);


// Route::prefix('items')->group(function () {
//     Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
//     Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
//     Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
// });
    // Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    // Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create']);
    // Route::post('/item/store', [App\Http\Controllers\ItemController::class, 'store']);
    // Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    // Route::post('/item/update', [App\Http\Controllers\ItemController::class, 'update']);
    // Route::get('/item/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete']);
});
