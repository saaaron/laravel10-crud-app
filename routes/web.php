<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\createController; // create records controller
use App\Http\Controllers\readController; // read records controller
use App\Http\Controllers\updateController; // update records controller
use App\Http\Controllers\deleteController; // delete records controller

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [readController::class, 'select_records']);

Route::get('home', [readController::class, 'select_records']);
Route::get('add', [createController::class, 'insert_form']);
Route::post('create', [createController::class, 'insert_record']);
Route::get('edit/{id}', [updateController::class, 'select_edit_record']);
Route::post('edit/{id}', [updateController::class, 'edit_record']);
Route::get('delete/{id}',[deleteController::class, 'delete_record']);