<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use App\Models\Show;
use App\Models\Episode;
use App\Http\Controllers\SearchController;
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



Route::get('/search', [SearchController::class, 'search'])->name('search.results');


// عرض الأقسام
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

// إنشاء قسم جديد
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.show');

// تعديل قسم موجود
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

// حذف قسم موجود
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/', [ShowController::class, 'index'])->name('home');


Route::post('/episodes', [EpisodeController::class, 'store'])->name('episodes.store');


Route::get('/shows', [ShowController::class, 'index'])->name('shows.index');
Route::get('/shows/{show}/episodes', [ShowController::class, 'episodes'])->name('show.episodes');

Route::get('/episodes/create', [EpisodeController::class, 'create'])->name('episodes.create')->middleware(['auth', 'role']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/episodes/{episode}', [EpisodeController::class, 'show'])->name('episodes.show');
Route::get('/profile/{id?}', [UserController::class, 'show'])->name('profile');
Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();




Route::middleware(['auth', 'role'])->group(function () {
  
    Route::resource('admin/users', UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

    Route::get('/shows/create', [ShowController::class, 'create'])->name('shows.create');
    Route::post('/shows', [ShowController::class, 'store'])->name('shows.store');
   


    Route::get('/admin', function () {
        $totalSeries = Show::count();
        $totalEpisodes = Episode::count();
        $totalUsers = User::count();
    
        return view('admin.dashboard', compact('totalSeries', 'totalEpisodes', 'totalUsers'));
    })->name('admin.dashboard');

    Route::get('/admin/series/{series}/episodes', [SeriesController::class, 'show'])->name('admin.series.episodes');


    Route::resource('admin/series', SeriesController::class)->names([
        'index' => 'admin.series.index',
        'create' => 'admin.series.create',
        'store' => 'admin.series.store',
        'show' => 'admin.series.show',
        'edit' => 'admin.series.edit',
        'update' => 'admin.series.update',
        'destroy' => 'admin.series.destroy',
    ]);
    
    Route::delete('/admin/episodes/{episode}', [EpisodeController::class, 'destroy'])->name('admin.episodes.destroy');
    Route::put('/admin/episodes/{episode}', [EpisodeController::class, 'update'])->name('admin.episodes.update');





});