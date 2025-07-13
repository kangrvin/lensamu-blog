<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Middleware\UserAccess;


// Halaman awal
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::post('/articles/search', [HomeController::class, 'index'])->name('search');

// Semua route ini hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    
    // Dashboard utama CMS
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Resource routes
    Route::resource('article', ArticleController::class);
    Route::resource('/categories', CategoryController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(UserAccess::class . ':1');

    Route::resource('/users', UserController::class);


    // Laravel File Manager (akses hanya setelah login)
    Route::group(['prefix' => 'laravel-filemanager'], 
    function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

// Auth bawaan Laravel
Auth::routes();

// HomeController bisa dijadikan opsional, atau hapus saja jika tidak dipakai
//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

