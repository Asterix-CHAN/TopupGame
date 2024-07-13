<?php

use App\Http\Controllers\Admin\TopupgamePackageController;
use App\Http\Controllers\GameListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth', 'verified', 'admin'])->group(function() {
    Route::get('/admin', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('topup-package', TopupgamePackageController::class);
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/games', [GameListController::class, 'index'])->name('games');
Route::get('/order', [OrderController::class, 'index'])->name('order');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
