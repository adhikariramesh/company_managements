<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\employeeController;

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

Route::get('/', function () {
    return view('frontend.header');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/reditect',[UserController::class,"redirect"]);



Route::get('/company',[adminController::class,"company"]);
Route::post('/add_company',[adminController::class,"addCompany"]);
Route::get('/show_details_company',[adminController::class, 'showCompany']);
Route::get('/delete_company/{id}',[adminController::class,"deleteCompany"]);
Route::get('/update_company/{id}', [adminController::class, 'editCompany']);
Route::post('/update_company/{id}', [adminController::class, 'updateCompany']);

Route::resource('employee', employeeController::class);
