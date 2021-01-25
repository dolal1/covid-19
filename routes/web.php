<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HospitalsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\HealthWorkersController;
use App\Http\Controllers\DonorsController;

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

Route::get('/patients', [PatientsController::class, 'index']);
Route::get('/patients/create', [PatientsController::class, 'create']);
Route::post('/patients', [PatientsController::class, 'store']);
Route::get('/patients/{id}', [PatientsController::class, 'show']);
Route::get('/patients/{id}/edit', [PatientsController::class, 'edit']);
Route::patch('/patients/{id}', [PatientsController::class, 'update']);
Route::delete('/patients/{id}', [PatientsController::class, 'destroy']);

Route::get('/healthworkers', [HealthWorkersController::class, 'index']);
Route::get('/healthworkers/create', [HealthWorkersController::class, 'create']);
Route::post('/healthworkers', [HealthWorkersController::class, 'store']);
Route::get('/healthworkers/{id}', [HealthWorkersController::class, 'show']);
Route::get('/healthworkers/{id}/edit', [HealthWorkersController::class, 'edit']);
Route::patch('/healthworkers/{id}', [HealthWorkersController::class, 'update']);
Route::delete('/healthworkers/{id}', [HealthWorkersController::class, 'destroy']);

Route::get('/hospitals', [HospitalsController::class, 'index']);
Route::get('/hospitals/create', [HospitalsController::class, 'create']);
Route::post('/hospitals', [HospitalsController::class, 'store']);
Route::get('/hospitals/{id}', [HospitalsController::class, 'show']);
Route::get('/hospitals/{id}/edit', [HospitalsController::class, 'edit']);
Route::patch('/hospitals/{id}', [HospitalsController::class, 'update']);
Route::delete('/hospitals/{id}', [HospitalsController::class, 'destroy']);

Route::get('/donors', [DonorsController::class, 'index']);
Route::get('/donors/create', [DonorsController::class, 'create']);
Route::post('/donors', [DonorsController::class, 'store']);
Route::get('/donors/{id}', [DonorsController::class, 'show']);
Route::get('/donors/{id}/edit', [DonorsController::class, 'edit']);
Route::patch('/donors/{id}', [DonorsController::class, 'update']);
Route::delete('/donors/{id}', [DonorsController::class, 'destroy']);