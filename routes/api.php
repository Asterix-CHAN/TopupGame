<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidtransController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/midtrans/callback', [MidtransController::class, 'notificationHandler']);
// Route::get('/midtrans/finish', [MidtransController::class, 'finishRedirect']);
// Route::get('/midtrans/unfinish', [MidtransController::class, 'unfinishRedirect']);
// Route::get('/midtrans/failed', [MidtransController::class, 'errorRedirect']);
