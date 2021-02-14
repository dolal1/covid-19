<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HospitalsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\HealthworkersController;
use App\Http\Controllers\DonorsController;
use App\Http\Controllers\DistrictsController;
use App\Http\Controllers\PaymentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'landingPage']);
Route::get('/dashboard', [PagesController::class, 'dashboardPage']);

Route::get('/signup', [SignupController::class, 'index'])->name('signup')->middleware('guest');
Route::post('/signup', [SignupController::class, 'signup'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('guest');

Route::get('/patients', [PatientsController::class, 'index']);
Route::get('/patients/create', [PatientsController::class, 'create'])->middleware('auth');
Route::post('/patients', [PatientsController::class, 'store'])->middleware('auth');
Route::get('/patients/{id}', [PatientsController::class, 'show']);
Route::get('/patients/{id}/edit', [PatientsController::class, 'edit'])->middleware('auth');
Route::patch('/patients/{id}', [PatientsController::class, 'update'])->middleware('auth');
Route::delete('/patients/{id}', [PatientsController::class, 'destroy'])->middleware('auth');

Route::get('/healthworkers', [HealthworkersController::class, 'index']);
Route::get('/healthworkers/create', [HealthworkersController::class, 'create'])->middleware('auth');
Route::post('/healthworkers', [HealthworkersController::class, 'store'])->middleware('auth');
Route::get('/healthworkers/{id}', [HealthworkersController::class, 'show']);
Route::get('/healthworkers/{id}/edit', [HealthworkersController::class, 'edit'])->middleware('auth');
Route::patch('/healthworkers/{id}', [HealthworkersController::class, 'update'])->middleware('auth');
Route::delete('/healthworkers/{id}', [HealthworkersController::class, 'destroy'])->middleware('auth');

Route::get('/hospitals', [HospitalsController::class, 'index']);
Route::get('/hospitals/create', [HospitalsController::class, 'create'])->middleware('auth');
Route::post('/hospitals', [HospitalsController::class, 'store'])->middleware('auth');
Route::get('/hospitals/{id}', [HospitalsController::class, 'show']);
Route::get('/hospitals/{id}/edit', [HospitalsController::class, 'edit'])->middleware('auth');
Route::patch('/hospitals/{id}', [HospitalsController::class, 'update'])->middleware('auth');
Route::delete('/hospitals/{id}', [HospitalsController::class, 'destroy'])->middleware('auth');

Route::get('/donors', [DonorsController::class, 'index']);
Route::get('/donors/create', [DonorsController::class, 'create'])->middleware('auth');
Route::post('/donors', [DonorsController::class, 'store'])->middleware('auth');
Route::get('/donors/{id}', [DonorsController::class, 'show']);
Route::get('/donors/{id}/edit', [DonorsController::class, 'edit'])->middleware('auth');
Route::patch('/donors/{id}', [DonorsController::class, 'update'])->middleware('auth');
Route::delete('/donors/{id}', [DonorsController::class, 'destroy'])->middleware('auth');

Route::get('/districts', [DistrictsController::class, 'index']);
Route::get('/districts/create', [DistrictsController::class, 'create'])->middleware('auth');
Route::post('/districts', [DistrictsController::class, 'store'])->middleware('auth');
Route::get('/districts/{id}', [DistrictsController::class, 'show']);
Route::get('/districts/{id}/edit', [DistrictsController::class, 'edit'])->middleware('auth');
Route::patch('/districts/{id}', [DistrictsController::class, 'update'])->middleware('auth');
Route::delete('/districts/{id}', [DistrictsController::class, 'destroy'])->middleware('auth');

Route::get('/payments', [PaymentsController::class, 'index'])->middleware('auth');
Route::get('/payments/create', [PaymentsController::class, 'create'])->middleware('auth');
Route::post('/payments', [PaymentsController::class, 'store'])->middleware('auth');
Route::get('/payments/{id}', [PaymentsController::class, 'show'])->middleware('auth');
Route::delete('/payments/{id}', [PaymentsController::class, 'destroy'])->middleware('auth');