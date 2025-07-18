<?php

use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\ConfigController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\SitemapController;

// Halaman awal
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/p/{slug}', [FrontArticleController::class, 'show']);
Route::get('/articles', [FrontArticleController::class, 'index']);
Route::post('/articles/search', [FrontArticleController::class, 'index'])->name('search');

Route::get('category/{slug}', [FrontCategoryController::class, 'index']);
Route::get('all-category', [FrontCategoryController::class, 'allCategory']);

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
    Route::resource('/config', ConfigController::class)->only([
        'index', 'update'
    ]);


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

