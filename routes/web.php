<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminDashbordController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\bookticketController;
use App\Http\Controllers\seatallocationController;
use App\Http\Controllers\tripController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('backend.layouts.master');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {


    Route::controller(adminDashbordController::class)->group(function () {
        Route::get('/logout', 'adminLogoutPage')->name('admin.logout.page');
        Route::get('/admin/logout', 'adminLogout')->name('admin.logout');
    });
});



Route::middleware('auth')->group(function () {

    Route::controller(locationController::class)->group(function () {
        Route::get('/dashbord/location', 'location')->name('dashbord.location');
        Route::get('/dashbord/location/all', 'locationAll')->name('dashbord.location.all');
        Route::post('/dashbord/location/store', 'store')->name('location.store');
        Route::delete('/location/{id}','destroy')->name('location.destroy');
    });
});


Route::middleware('auth')->group(function () {

    Route::controller(seatallocationController::class)->group(function () {
        Route::get('/dashbord/seat/allocation/all', 'seatAllocationAll')->name('dashbord.seatallocation');
        Route::get('/dashbord/seat/allocation', 'seatAllocation')->name('dashbord.seatAllocation');
        Route::post('/dashbord/seat/allocation/store', 'seatStore')->name('dashbord.seatStore');
        Route::delete('seat/allocation/{id}','destroy')->name('seatAllocation.destroy');
        
    });
});


Route::middleware('auth')->group(function () {

    Route::controller(tripController::class)->group(function () {
        Route::get('/dashbord/trips/all', 'tripall')->name('dashbord.tripall');
        Route::get('/dashbord/trips/trip_create', 'tripcreate')->name('dashbord.trip.create');
        Route::post('/dashbord/trips/trip_store', 'tripstore')->name('dashbord.trip.store');
        Route::get('/dashbord/trips//{id}/edit', 'tripedit')->name('dashbord.trip.edit');
        Route::post('/dashbord/trips/update', 'tripupdate')->name('dashbord.trip.update');
        Route::delete('/dashbord/trips{id}/delete','tripdelete')->name('dashbord.trip.delete');
        Route::get('/dashbord/trips/search', 'tripsearch')->name('dashbord.trip.search');
        Route::get('/dashbord/seat/all/{id}', 'seatAll')->name('dashbord.seatAll');
    });
});


Route::middleware('auth')->group(function () {

    Route::controller(bookticketController::class)->group(function () {
        Route::get('/dashbord/book/ticket', 'customerbookAll')->name('dashbord.book.ticket');
        Route::get('/dashbord/book/add_book_ticket', 'add_book_ticket')->name('dashbord.add_book_ticket');
        Route::post('/dashbord/book/store_book_ticket', 'store_book_ticket')->name('dashbord.store_book_ticket');
        Route::get('/dashbord/book/all_book_ticket', 'all_book_ticket')->name('dashbord.all_book_ticket');
        
    });
});

require __DIR__.'/auth.php';
