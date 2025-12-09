<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Authentication routes
Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUp']);
Route::get('/signin', [AuthController::class, 'showSignIn'])->name('login');
Route::post('/signin', [AuthController::class, 'signIn']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// User routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('user.edit-profile');
    Route::post('/profile/edit', [UserController::class, 'updateProfile']);

    // Favorites routes
    Route::get('/favorites/movie/add/{id}', [UserController::class, 'addMovieToFavorites'])->name('favorites.movie.add');
    Route::get('/favorites/movie/remove/{id}', [UserController::class, 'removeMovieFromFavorites'])->name('favorites.movie.remove');
    Route::get('/favorites/series/add/{id}', [UserController::class, 'addSeriesToFavorites'])->name('favorites.series.add');
    Route::get('/favorites/series/remove/{id}', [UserController::class, 'removeSeriesFromFavorites'])->name('favorites.series.remove');
});

// Admin routes (protected)
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/movie/add', [AdminController::class, 'showAddMovie'])->name('admin.movie.add');
    Route::post('/admin/movie/add', [AdminController::class, 'storeMovie'])->name('admin.movie.store');
    Route::get('/admin/series/add', [AdminController::class, 'showAddSeries'])->name('admin.series.add');
    Route::post('/admin/series/add', [AdminController::class, 'storeSeries'])->name('admin.series.store');
    Route::get('/admin/actor/add', [AdminController::class, 'showAddActor'])->name('admin.actor.add');
    Route::post('/admin/actor/add', [AdminController::class, 'storeActor'])->name('admin.actor.store');
    Route::get('/admin/director/add', [AdminController::class, 'showAddDirector'])->name('admin.director.add');
    Route::post('/admin/director/add', [AdminController::class, 'storeDirector'])->name('admin.director.store');
    Route::get('/admin/prize/add', [AdminController::class, 'showAddPrize'])->name('admin.prize.add');
    Route::post('/admin/prize/add', [AdminController::class, 'storePrize'])->name('admin.prize.store');
});

// Homepage route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Series listing route
Route::get('/series', [SeriesController::class, 'index'])->name('series.index');

Route::get('/actor/{id}', [ActorController::class, 'show'])->name('actor.show');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');
Route::get('/series/{id}', [SeriesController::class, 'show'])->name('series.show');
Route::get('/director/{id}', [DirectorController::class, 'show'])->name('director.show');

Route::get('/movies', function() {
    return redirect()->route('home');
});
