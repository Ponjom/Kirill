<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TracksController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('index');
Route::get('/contact', ContactController::class)->name('contact');

Route::get('/events', [EventsController::class, 'index'])->name('event.index');
Route::get('/event/{event}', [EventsController::class, 'show'])->name('event.show');

Route::get('/albums', [AlbumsController::class, 'index'])->name('album.index');
Route::get('/album/{album}', [AlbumsController::class, 'show'])->name('album.show');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/track/{track}/like', [TracksController::class, 'like'])->name('track.like');
    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        Route::get('/admin/user/{user}/status/toggle', [AdminController::class, 'adminToggle'])->name('admin.status.toggle');
        Route::get('/admin/user/{user}/delete', [UserController::class, 'destroy'])->name('admin.user.destroy');

        Route::get('/admin/event/create', [EventsController::class, 'create'])->name('admin.event.create');
        Route::post('/admin/event', [EventsController::class, 'store'])->name('admin.event.store');
        Route::get('/admin/event/{event}', [EventsController::class, 'edit'])->name('admin.event.edit');
        Route::put('/admin/event/{event}', [EventsController::class, 'update'])->name('admin.event.update');
        Route::get('/admin/event/{event}/delete', [EventsController::class, 'destroy'])->name('admin.event.destroy');

        Route::get('/admin/album/create', [AlbumsController::class, 'create'])->name('admin.album.create');
        Route::post('/admin/album', [AlbumsController::class, 'store'])->name('admin.album.store');
        Route::get('/admin/album/{album}', [AlbumsController::class, 'edit'])->name('admin.album.edit');
        Route::put('/admin/album/{album}', [AlbumsController::class, 'update'])->name('admin.album.update');
        Route::get('/admin/album/{album}/delete', [AlbumsController::class, 'destroy'])->name('admin.album.destroy');

        Route::get('/admin/track/create', [TracksController::class, 'create'])->name('admin.track.create');
        Route::post('/admin/track', [TracksController::class, 'store'])->name('admin.track.store');
        Route::get('/admin/track/{track}', [TracksController::class, 'edit'])->name('admin.track.edit');
        Route::put('/admin/track/{track}', [TracksController::class, 'update'])->name('admin.track.update');
        Route::get('/admin/track/{track}/delete', [TracksController::class, 'destroy'])->name('admin.track.destroy');
    });
});
