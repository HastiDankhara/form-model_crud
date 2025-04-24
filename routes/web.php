<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

// Route::get('/', function () {
//     return view('welcome');
// });

// for showing the crud data
Route::resource('crud', CrudController::class);
