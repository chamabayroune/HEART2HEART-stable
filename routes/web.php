<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'Home'])->name('home');
Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::post('/AddAppointment', [HomeController::class, 'AddAppointment'])->middleware(['auth', 'verified'])->name('AddAppointment');





Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('dashboard');
    Route::post('/AjouteSpecialitie', [DoctorController::class, 'AddSpecialitie']);
    Route::delete('/deleteepatient/{id}', [DoctorController::class, 'deletepatient']);
    Route::delete('/deleteReservation/{id}', [DoctorController::class, 'deleteReservations']);
    Route::delete('/deletespecialitie/{id}', [DoctorController::class, 'deleteSpecialities']);
    Route::delete('/deletedonateur/{id}', [DoctorController::class, 'deleteDonations']);
    Route::put('/updatepatient/{id}', [DoctorController::class, 'updatepatient']);
    Route::put('/updateSpecialities/{id}', [DoctorController::class, 'updateSpecialities']);
    Route::put('/updateDonations/{id}', [DoctorController::class, 'updatedonateur']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// define route for the doctor controller :


// Route::get('/', [DoctorController::class, 'index'])->name('doctors.index');
// Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
// Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
// Route::get('/doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
// Route::put('/doctors/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');
// Route::delete('/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
// In this example, we've defined routes for each of the CRUD operations for our Doctor model. The name() method is used to give each route a name, which we can use later to generate URLs.

