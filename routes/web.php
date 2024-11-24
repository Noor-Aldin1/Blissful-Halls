<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessorRegisterController;
use App\Http\Controllers\LessorLoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingjsonController;
use App\Http\Controllers\BookingProfile;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LessorController;
use App\Http\Controllers\show_BookingController;
use App\Http\Controllers\usPropertyController;
use App\Http\Controllers\usUserController;
use App\Http\Controllers\UserBooking_show_Controller;
use App\Http\Controllers\DaBookingController;
use App\Http\Controllers\DaAdminController;

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

Route::get('/', [usPropertyController::class, 'index'])->name('home');
Route::get('/property/{id}', [usPropertyController::class, 'show'])->name('showproperty');


Route::get('/property', [usPropertyController::class, 'search'])->name('property');

Route::get('/userprofile', [usUserController::class, 'index'])->name('usprofile');
Route::post('/userprofile', [usUserController::class, 'updateProfile'])->name('updateusprofile');
Route::get('/profilebooking/{id}', [BookingProfile::class, 'index'])->name('mybooking');


Route::get('/user/fqg', function () {
    return view('useraa.Faq');
})->name('Faq');
Route::get('/user/about', function () {
    return view('useraa.aboutus');
})->name('about');
Route::get('/user/contact', function () {
    return view('useraa.contact');
})->name('contact');
Route::get('/user/host', function () {
    return view('useraa.host');
})->name('host');

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/user/index', function () {
    return view('user.index');
})->name('index');
Route::get('/admin/dashboord', function () {
    return view('admin.dashboord');
})->name('admin.dashboord');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -----register Lessor ---------
Route::get('/lessor/register', [LessorRegisterController::class, 'showRegistrationForm'])->name('lessor.register');
Route::post('/lessor/register', [LessorRegisterController::class, 'register'])->name('lessor.register');

Route::get('/lessor/update', [LessorRegisterController::class, 'showUpdateForm'])->name('lessor.update');
Route::put('/lessor/update', [LessorRegisterController::class, 'update'])->name('lessor.update');
// -----login Lessor ---------
Route::get('lessor/login', [LessorLoginController::class, 'showLoginForm'])->name('lessor.login');
Route::post('lessor/login', [LessorLoginController::class, 'login']);
Route::post('lessor/logout', [LessorLoginController::class, 'logout'])->name('lessor.logout');
require __DIR__ . '/auth.php';




// -----booking route ---------
Route::get('/checkin/{propertyId}', [BookingController::class, 'showCheckInForm'])->name('checkin.show');

// Define the route for storing a booking
Route::post('/store-booking', [BookingController::class, 'storeBooking'])->name('store.booking');

// Route::get('/checkin/{propertyId}', [BookingController::class, 'showCheckInForm'])->name('checkin.form');
Route::get('/checkin/{propertyId}', [BookingController::class, 'showCheckInForm'])->name('checkin.show');

Route::post('/booking', [BookingController::class, 'storeBooking'])->name('booking.store');
Route::get('/bookings/availability', [BookingjsonController::class, 'index'])->name('bookings.availability');


//--------properties-----

Route::resource('properties', PropertyController::class);


//---review ----
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


// -------template shop --------
Route::get('/user/home', function () {
    return view('user.home');
});
Route::get('/user/acount', function () {
    return view('user.acount');
});
Route::get('/user/acountinfo/profile', function () {
    return view('user.acount_info_section.acount_profile_main');
});
Route::get('/user/acountinfo/card', function () {
    return view('user.acount_info_section.acount_card_main');
});
// Route::get('/user/checkout', function () {
//     return view('useraa.checkout');
// });
Route::get('/checkout', [BookingController::class, 'checkoutPage'])->name('checkout.page');

Route::get('/main_show', function () {
    return view('properties.show_main');
});


// -------routes lessor---------


Route::middleware(['auth', 'checkLessorRole'])->group(function () {
    Route::get('/lessor/dashboard', [LessorController::class, 'dashboard'])->name('lessor.dashboard');
    Route::post('/lessor/{id}/toggleAvailability', [LessorController::class, 'toggleAvailability'])->name('lessor.toggleAvailability');
    Route::get('/lessor/create', [LessorController::class, 'create'])->name('lessor.create');
    Route::post('/lessor/store', [LessorController::class, 'store'])->name('lessor.store');
    Route::get('/lessor/edit/{id}', [LessorController::class, 'edit'])->name('lessor.edit');
    Route::post('/lessor/update/{id}', [LessorController::class, 'update'])->name('lessor.update');
    Route::delete('/lessor/delete/{id}', [LessorController::class, 'destroy'])->name('lessor.destroy');

    Route::delete('/property_images/{id}', [LessorController::class, 'deleteImage'])->name('property_images.delete');

    Route::get('/lessor/bookings', [show_BookingController::class, 'index'])->name('lessor.bookings');
    Route::get('/lessor/bookings/{id}', [show_BookingController::class, 'show'])->name('lessor.bookings.show');
    Route::post('/lessor/dashboard/accept/{id}', [LessorController::class, 'acceptBooking'])->name('lessor.dashboard.accept'); // for the dashboard
    Route::post('/lessor/dashboard/reject/{id}', [LessorController::class, 'rejectBooking'])->name('lessor.dashboard.reject'); // for the dashboard
    Route::post('/lessor/bookings/accept/{id}', [BookingController::class, 'acceptBooking'])->name('lessor.bookings.accept'); // for the booking
    Route::post('/lessor/bookings/reject/{id}', [BookingController::class, 'rejectBooking'])->name('lessor.bookings.reject'); // for the booking

    require __DIR__ . '/adminRou.php';
    require __DIR__ . '/user.php';
});


Route::get('/test', function () {
    return view('test');
});



// -----------show booking user in deatiles ----------


Route::get('/bookings/{userId}', [UserBooking_show_Controller::class, 'index'])->name('bookings.index');
Route::delete('/bookings/{id}/cancel', [UserBooking_show_Controller::class, 'cancel'])->name('booking.cancel');
// Routes for booking process
Route::get('/check-in/{propertyId}', [BookingController::class, 'showCheckInForm'])->name('checkin.form');

// Route to store a new booking
Route::post('/store-booking', [BookingController::class, 'storeBooking'])->name('store.booking');

// Route to display the checkout page
Route::get('/checkout', [BookingController::class, 'checkoutPage'])->name('checkout.page');

// Route to finalize a booking
Route::post('/finalize-booking', [BookingController::class, 'finalizeBooking'])->name('finalize.booking');

Route::middleware(['auth'])->group(function () {
    Route::resource('admin/bookings', DaBookingController::class)->except(['show']);

    Route::get('/admin/dashboard', [DaAdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/bookings/available-time-slots', [DaBookingController::class, 'getAvailableTimeSlots']);

    Route::get('/admin/bookings/calculate-price', [DaBookingController::class, 'calculatePrice']);
    Route::get('/bookings/fetch-available-slots', [DaBookingController::class, 'fetchAvailableSlots'])->name('bookings.fetchAvailableSlots');
    Route::get('/admin/dashboard', [DaAdminController::class, 'dashboard'])->name('admin.dashboard');

});