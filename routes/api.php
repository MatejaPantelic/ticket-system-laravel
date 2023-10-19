<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

    Route::post('/auth/register', [AuthController::class, 'createUser'])->name('register');
    Route::post('/auth/login', [AuthController::class, 'loginUser'])->name('login');

    Route::post('/ticket/create', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/ticket/info/{ticket_number}', [TicketController::class, 'show'])->name('ticket.show');
    Route::patch('/ticket/check/{ticket_number}', [TicketController::class, 'update'])->name('ticket.update');
