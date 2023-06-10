<?php

use App\Http\Controllers\Backend\BackEndController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::get('/', [FrontendController::class, 'index'])->name('front.index');
Route::get('/single-post', [FrontendController::class, 'single'])->name('front.single');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [BackEndController::class, 'index'])->name('back.index');
    Route::resource('category', CategoryController::class);
    Route::get('get-subcategory/{id}',[SubCategoryController::class,'getSubCategoryByCategoryId']);
    Route::resource('sub-category', SubCategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
