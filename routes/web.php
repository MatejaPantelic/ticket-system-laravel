<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/ticket-info', function () {
    return view('tickets.index');
})->middleware(['auth', 'verified'])->name('ticket.info');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/ticket-info',[TicketController::class,'show'])->name('ticket.valid');
Route::patch('/ticket-info',[TicketController::class,'update'])->name('ticket.check');
Route::get('/ticket-create',[TicketController::class,'create'])->name('ticket.create');
Route::post('/ticket-create',[TicketController::class,'store'])->name('ticket.store');

Route::get('/users',[UserController::class,'index'])->name('user.index');
Route::delete('/user-delete/{user_id}/',[UserController::class,'destroy'])->name('user.destroy');
Route::post('/assign-admin/{user_id}/',[UserController::class,'assignAdminRole'])->name('user.assignAdmin');
Route::post('/assign-controller/{user_id}/',[UserController::class,'assignControllerRole'])->name('user.assignController');

require __DIR__.'/auth.php';
