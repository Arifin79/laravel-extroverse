<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TeamController;
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

/** set side bar active dynamic */
function set_active($route) {
    if(is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active': '';
}

Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/karyawan/home', [HomeController::class, 'index'])->name('home.karyawan');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('home');
});

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'authentication']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile');

Route::get('/assignment', [AssignmentController::class, 'index'])->middleware('auth')->name('assignment');
Route::get('/assignment/index', [AssignmentController::class, 'index'])->middleware('auth')->name('assignment/index');
Route::get('/assignment/create', [AssignmentController::class, 'create'])->name('assignment/create');
Route::post('/assignment/store', [AssignmentController::class, 'store'])->name('assignment/store');
Route::put('/assignment/update', [AssignmentController::class, 'update'])->name('assignment/update');
Route::delete('/assignment/{id}', [AssignmentController::class, 'destroy'])->name('assignment/destroy');
Route::get('/assignment/edit/{id}', [AssignmentController::class, 'edit'])->name('assignment/edit');

Route::get('/information', [InformationController::class, 'index'])->middleware('auth')->name('information');
Route::get('/information/index', [InformationController::class, 'index'])->middleware('auth')->name('information/index');
Route::get('/information/create', [InformationController::class, 'create'])->name('information/create');
Route::post('/information/store', [InformationController::class, 'store'])->name('information/store');
Route::put('/information/update', [InformationController::class, 'update'])->name('information/update');
Route::delete('/information/{id}', [InformationController::class, 'destroy'])->name('information/destroy');
Route::get('/information/edit/{id}', [InformationController::class, 'edit'])->name('information/edit');

Route::get('/team', [TeamController::class, 'index'])->middleware('auth')->name('team');




