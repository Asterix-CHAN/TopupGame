<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GameListController;

use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\DiamondController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
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


// Index
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/games', [GameListController::class, 'index'])->name('games');
Route::get('/filter/{name}', [GamelistController::class, 'show'])->name('showPlatform');
// Route::get('/order/{id}', [OrderController::class, 'index'])->name('order');
Route::get('/order/{slug}', [CheckoutController::class, 'index'])->name('order');

// Role Admin
Route::middleware(['auth', 'verified', 'role:admin'])->group(function() {

    Route::get('/admin', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('product-packages', ProductController::class);
    Route::get('product-packages/create/{uuid}', [ProductController::class, 'create'])->name('product-packages.create');
    // Route::post('diamonds/event', [DiamondController::class, 'createEvent'])->name('diamonds.createEvent');
    Route::resource('game-packages', TopupgamePackageController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('platform', PlatformController::class);
    Route::resource('diamonds', DiamondController::class);
    Route::resource('events', EventController::class);
    Route::get('events/create-event/{uuid}', [EventController::class, 'createEvent'])->name('event.createEvent');
    Route::get('/users', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}', [UserController::class, 'destroy'])->name('users.delete');
    // Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
});

Route::get('/cart', function(){
    return view('pages.cart');
})->name('cart');

Route::middleware(['auth'])->group(function(){
    Route::get('/transaction/{slug}', [TransactionController::class, 'index'])->name('transaction.index');
    Route::post('/order/{slug}', [CheckoutController::class, 'process'])->name('order_process');
 });


// Role User
Route::middleware('role:user')->group(function(){
    // Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

require __DIR__.'/auth.php';
