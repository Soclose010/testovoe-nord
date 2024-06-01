<?php

use App\Http\Controllers\EntriesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [EntriesController::class, "index"])->name('home');
Route::get('/create', [EntriesController::class, "create"])->name('create');
Route::post('/store', [EntriesController::class, "store"])->name('store');
