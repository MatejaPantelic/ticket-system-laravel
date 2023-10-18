<?php

use App\Http\Controllers\Auth\WebAuthController;
use App\Http\Controllers\TicketController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [WebAuthController::class, 'showLogin'])->name('show.login');
Route::get('/register', [WebAuthController::class, 'showRegister'])->name('show.register');
Route::post('/user/login', [WebAuthController::class, 'loginUser'])->name('web.login');
Route::post('/user/register', [WebAuthController::class, 'registerUser'])->name('web.register');

Route::get('/home', [TicketController::class, 'index'])->name('home');

