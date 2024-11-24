<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaAdminController;
use App\Http\Controllers\DaUserController;
use App\Http\Controllers\DaPropertyController;
use App\Http\Controllers\DaLessorController;


Route::middleware(['auth', 'CheckAdminRole'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.adminDashboard');
    })->name('admin.dashboard');

    Route::get('/admin/profile', [DaAdminController::class, 'showProfile'])->name('admin.profile.show');
    Route::get('/admin/profile/edit', [DaAdminController::class, 'editProfile'])->name('admin.profile.edit');
    Route::post('/admin/profile/update', [DaAdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::delete('/admin/profile/delete', [DaAdminController::class, 'deleteProfile'])->name('admin.profile.delete');

    Route::get('/admin/properties/pending', [DaAdminController::class, 'pendingProperties'])->name('admin.properties.pending');
    Route::post('/admin/properties/{property}/approve', [DaAdminController::class, 'approveProperty'])->name('admin.properties.approve');
    Route::post('/admin/properties/{property}/reject', [DaAdminController::class, 'rejectProperty'])->name('admin.properties.reject');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('properties', DaPropertyController::class);
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('users', DaUserController::class);
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('lessors', DaLessorController::class);
    });
    // -------------accepted--------------------
    Route::get('/admin/accepted', [DaAdminController::class, 'acceptedProperties'])->name('admin.properties.accepted');
    Route::post('/admin/properties/{id}/pend', [DaAdminController::class, 'pendProperty'])->name('admin.properties.pend');
    Route::post('/admin/properties/{id}/reject', [DaAdminController::class, 'rejectProperty'])->name('admin.properties.reject');
    Route::get('/admin/rejected', [DaAdminController::class, 'rejectedProperties'])->name('admin.properties.rejected');
    //    -----------------------------------
});
