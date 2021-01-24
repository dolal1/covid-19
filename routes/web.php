<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HospitalsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\HealthWorkersController;

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
Route::get('/patients/{id}', [PatientsController::class, 'show']);

Route::get('/healthworkers', [HealthWorkersController::class, 'index']);
Route::get('/healthworkers/create', [HealthWorkersController::class, 'create']);
Route::get('/healthworkers/{id}', [HealthWorkersController::class, 'show']);

Route::get('/hospitals', [HospitalsController::class, 'index']);
Route::get('/hospitals/create', [HospitalsController::class, 'create']);
Route::get('/hospitals/{id}', [HospitalsController::class, 'show']);