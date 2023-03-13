<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;


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

Route::resource('items', 'App\Http\Controllers\ItemController');
Route::resource('users', 'App\Http\Controllers\UserController');

Route::get('/', function () {
    return view('welcome');
}); 


Auth::routes(); 

Route::get('/home', [HomeController::class, 'index'])->name('home');

//C del CRUD
Route::get('/createItem', [ItemController::class, 'create'])->name('create')->middleware('isadmin', 'auth');
Route::post('/', [ItemController::class, 'store'])->name('store')->middleware('isadmin', 'auth');

//R del CRUD
Route::get('/',[ItemController::class,'index'])->name('home');
Route::get('/home',[ItemController::class,'index']);

//U del CRUD
Route::get('/edit/{id}', [ItemController::class, 'edit'])->name('editItem')->middleware('isadmin', 'auth');
Route::patch('/item/{id}', [ItemController::class, 'update'])->name('updateItem')->middleware('isadmin', 'auth');

// D del CRUD
Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('deleteItem')->middleware('isadmin', 'auth');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('showItem')->middleware('isadmin', 'auth');

//S Show
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/show/{id}',[ItemController::class,'show'])->name('showItem');