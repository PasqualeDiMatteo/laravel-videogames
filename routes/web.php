<?php

use App\Http\Controllers\Admin\Games\GameController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [GuestHomeController::class, "index"])->name("guest.home");



Route::middleware('auth')->name("admin.")->prefix("/admin")->group(function () {
    Route::get('/', [AdminHomeController::class, "index"])->name('index');

    // Trash Route
    Route::get('/games/trash', [GameController::class, 'trash'])->name('games.trash');

    // Drop games Route 
    Route::delete('/games/{game}/drop', [GameController::class, 'drop'])->name('games.drop');

    // Restore Games Route 
    Route::patch('/games/{game}/restore', [GameController::class, 'restore'])->name('games.restore');

    // All Resources
    Route::resource("/games", GameController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
