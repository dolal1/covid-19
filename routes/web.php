<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HospitalsController;
use App\Http\Controllers\PatientsController;

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

Route::get('/patients', [PatientsController::class, 'viewPatientsPage']);

Route::get('/hospitals', [HospitalsController::class, 'viewHospitalsPage']);