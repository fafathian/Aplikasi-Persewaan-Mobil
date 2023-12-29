<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\RentalAdminController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\RentalController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/search', [HomeController::class, 'search'])->name('search');


Route::get('/rental/create', [RentalController::class, 'create'])->name('rental.create');
Route::post('/rental/store', [RentalController::class, 'store'])->name('rental.store');

Route::middleware('auth')->group(function () {

    Route::get('/rental/aktifitas', [RentalController::class, 'userRentals'])->name('user.rentals');
    Route::get('/rental/{mobilId}/return', [RentalController::class, 'returnForm'])->name('rental.returnForm');
    Route::post('/rental/{mobilId}/return',  [RentalController::class, 'returnCar'])->name('rental.return');
});

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.dashboard');

    Route::resource('/admin/mobil', MobilController::class);

    Route::resource('/admin/RentalAdmin', RentalAdminController::class);

    Route::get('/admin/RentalAdmin/{mobilId}/return', [RentalAdminController::class, 'returnForm'])->name('RentalAdmin.returnForm');
    Route::post('/admin/RentalAdmin/{mobilId}/return',  [RentalAdminController::class, 'returnCar'])->name('RentalAdmin.return');
});
