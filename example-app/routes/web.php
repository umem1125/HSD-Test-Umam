<?php

use App\Http\Controllers\CategoryPageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('categories', [CategoryPageController::class, 'index']);
// Route::post('category', [CategoryPageController::class, 'store'])->name('category.store');
