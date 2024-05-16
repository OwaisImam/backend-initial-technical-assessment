<?php

use App\Http\Controllers\GuestController;
use Illuminate\Http\Request;
use App\Models\GuestbookEntry;
use Illuminate\Support\Facades\{Auth, Route};

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

Route::get('/', [GuestController::class, 'index'])->name('index');
Route::get('/submit', [GuestController::class, 'submitForm'])->name('submitForm');
