<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BindingController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::resource('/books', BookController::class);
Route::resource('/bindings', BindingController::class);
Route::resource('/formats', FormatController::class);
Route::resource('/letters', LetterController::class);
Route::resource('/languages', LanguageController::class);
Route::resource('/publishers', PublisherController::class);
Route::resource('/authors', AuthorController::class);
Route::resource('/categories', CategoryController::class);