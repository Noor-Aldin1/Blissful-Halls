<?php

use App\Http\Controllers\BookingjsonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Route::apiResource('bookings', BookingjsonController::class);
Route::get('/bookings', [BookingjsonController::class, 'index'])->name('api.bookings');
Route::get('/booking/{propertyId}', [BookingjsonController::class, 'show'])->name('api.booking.id');
