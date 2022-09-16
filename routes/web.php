<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\FormController;

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

/*WELCOME*/
Route::get('/', [GeneralController::class,'welcome']);

/*FIRST*/
Route::get('first', [CalendarController::class,'first']);
Route::get('calendar', [CalendarController::class,'move']);
Route::post('calendar', [CalendarController::class,'calendar'])->name('calendar');

/*SECOND*/
Route::get('second',[ExcelController::class,'second']);
Route::post('excel', [ExcelController::class,'excel'])->name('excel');

/*THIRD*/
Route::get('third',[FormController::class,'third']);
//user
Route::get('register_priv',[FormController::class,'register_priv']);
Route::post('register_priv',[FormController::class,'register_priv_save'])->name('register_priv');
//company
Route::get('register_company',[FormController::class,'register_company']);
Route::post('register_company',[FormController::class,'register_company_save'])->name('register_company');