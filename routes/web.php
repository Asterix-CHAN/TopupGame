<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GameListController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\TopupgamePackageController;

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
        return view('dashboard');})->name('dashboard');
    Route::resource('topup-package', TopupgamePackageController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('platform', PlatformController::class);
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/games', [GameListController::class, 'index'])->name('games');
Route::get('/filter/{name}', [GamelistController::class, 'show'])->name('showPlatform');

Route::get('/order/{slug}', [OrderController::class, 'index'])->name('order');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

require __DIR__.'/auth.php';
