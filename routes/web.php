<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObsPogController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', [ObsPogController::class, 'index'])->name('obs_pog.index');

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/services', [ServicesController::class, 'index'])->name('services.index');

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
    Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
    Route::get('/messages', [ContactController::class, 'showMessages'])->name('messages.index');
    Route::get('/reply-form/{id}', [ContactController::class, 'replyForm'])->name('reply.form');
    Route::post('/send-reply-email', [ContactController::class, 'sendReplyEmail'])->name('send.reply.email');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/users', [UserController::class, 'showRTwo'])->name('users.index')->middleware('admin');
    Route::get('/users/{id}/edit', [UserController::class,'editRTwo'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class,'updateRTwo'])->name('users.update');
    Route::get('/users/create', [UserController::class,'create'])->name('users.create');
    Route::post('/users', [UserController::class,'store'])->name('users.store');
    Route::delete('/users/{id}', [UserController::class,'destroy'])->name('users.destroy');

});

Route::controller(ServicesController::class)->group(function () {
    Route::get('/services/{id}/edit', [ServicesController::class,'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServicesController::class,'update'])->name('services.update');
    Route::delete('/services/{id}', [ServicesController::class,'destroy'])->name('services.destroy');
    Route::post('/services', [ServicesController::class,'store'])->name('services.store');
    Route::get('/services/create', [ServicesController::class,'create'])->name('services.create');
    Route::get('/services/all', [ServicesController::class, 'indexa'])->name('services.indexa');
    Route::get('/services/{id}', [ServicesController::class, 'show'])->name('services.show');

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

    Route::get('/reservations/all', [ReservationController::class, 'indexa'])->name('reservations.indexa');
    Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');

    Route::post('/reservation/preview', [ReservationController::class, 'preview'])->name('reservation.preview');
    Route::get('/reservation/summary', function () {
        return view('reservation.summary');
    })->name('reservation.summary');

    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
});

// Wyświetlanie danych użytkownika
Route::get('/profil', [UserController::class,'show'])->name('profil.show');

// Formularz edycji danych użytkownika
Route::get('/profil/edit', [UserController::class,'edit'])->name('profil.edit');
Route::put('/profil', [UserController::class,'update'])->name('profil.update');
