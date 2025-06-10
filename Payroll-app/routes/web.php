<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('users.login'); })->name('start');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::post('/', [UserController::class, 'login'])->name('login');

Route::get('/logout',[UserController::class, 'logout'])->name('logout');

Route::get('/select',[DashboardController::class, 'select'])->name('select');

Route::post('/select',[SalaryController::class,'buffer'])->middleware('auth')->name('payment.buffer');

Route::get('/select/{user}/payment',[SalaryController::class,'payment'])->middleware('auth')->name('payment');

Route::post('/select/{user}/payment', [SalaryController::class, 'pay'])->middleware('auth')->name('pay');

Route::get('/user/create',[UserController::class, 'create'])->name('users.create');

Route::post('/user/create',[UserController::class, 'store'])->name('users.store');

Route::get('/user/{user}',[UserController::class, 'show'])->middleware('auth')->name('users.show');

Route::get('/user/{user}/edit',[UserController::class, 'edit'])->middleware('auth')->name('users.edit');

Route::post('/user/{user}/edit',[UserController::class, 'update'])->middleware('auth')->name('users.update');

Route::get('/user/{user}/history',[UserController::class, 'history'])->name('users.history');

Route::get('/list/user/{user}',[UserController::class, 'destroy'])->name('users.destroy');

Route::get('/list/user/{user}/edit',[UserController::class, 'listEdit'])->name('userlist.edit');

Route::post('/list/user/{user}/edit',[UserController::class, 'listUpdate'])->middleware('auth')->name('userlist.update');

Route::get('/list/user',[DashboardController::class, 'userList'])->name('users.list');

Route::get('/list/salary',[DashboardController::class, 'salaryList'])->name('salary.list');

Route::get('/salary/{salary}/details',[SalaryController::class, 'details'])->name('salary.details');

Route::get('/list/occupation',[DashboardController::class, 'occupationList'])->name('occupations.list');

Route::get('/occupation/create',[OccupationController::class, 'create'])->name('occupations.create');

Route::post('/occupation/create',[OccupationController::class, 'store'])->name('occupations.store');

Route::get('/list/occupation/{occupation}',[OccupationController::class, 'destroy'])->name('occupations.destroy');

Route::get('/occupation/{occupation}/edit',[OccupationController::class, 'edit'])->middleware('auth')->name('occupations.edit');

Route::post('/occupation/{occupation}/edit',[OccupationController::class, 'update'])->middleware('auth')->name('occupations.update');




