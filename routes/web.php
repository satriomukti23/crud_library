<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\authController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Middleware\Kernel;
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

Route::get('/', [homeController::class, 'dashboard']);
Route::get('/register', [authController::class, 'register']);
Route::post('/dashboard', [homeController::class, 'home']);

Route::get('/master', function(){
    return view('layouts.blank');
});

Route::get('/table' , function(){
    return view ('page.table');
});

Route::get('/data-table', function() {
    return view('page.data-table');
});



// Category
Route::get('/category/create', [categoryController::class, 'create']);
Route::post('/category', [categoryController::class, 'store']);

Route::get('/category', [categoryController::class, 'getall']);
Route::get('/category/{id}', [categoryController::class, 'showid']);

Route::get('/category/{id}/edit', [categoryController::class, 'edit']);
Route::put('/category/{id}', [categoryController::class, 'update']);

Route::delete('/category/{id}', [categoryController::class, 'destroy']);

//Borrow
Route::post('/borrow/{book_id}', [BorrowController::class, 'store']);

//Book
Route::resource('/book', BookController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [homeController::class, 'index'])->name('home');
