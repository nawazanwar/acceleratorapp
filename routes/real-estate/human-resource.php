<?php


use App\Http\Controllers\RealEstate\HumanResource\HumanResourceController;
use App\Http\Controllers\RealEstate\HumanResource\NomineeController;
use App\Http\Controllers\RealEstate\HumanResource\PowerOfAttorneyController;
use App\Http\Controllers\RealEstate\HumanResource\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Temporary Route, will be removed when nav is set
Route::resource('/human-resource', HumanResourceController::class, ['names' => 'human-resource']);
Route::resource('/nominee', NomineeController::class, ['names' => 'nominee']);
Route::resource('/poa', PowerOfAttorneyController::class, ['names' => 'poa']);
Route::resource('/employees', EmployeeController::class, ['names' => 'employees']);
Route::post('/add-hr-ajax', [HumanResourceController::class, 'addHrAjax'])->name('add.hr-ajax');
