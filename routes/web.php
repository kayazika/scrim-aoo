<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\RoundController;
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


//Home Page
Route::get('/', function () {
    return view('welcome');
});

//Dashboard
Route::get('/dashboard', [EventController::class, 'list'])->middleware(['auth', 'verified'])->name('dashboard');

//Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Event
//Route List Located in Dashboard Route
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::post('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
Route::get('/event/destroy/{id}', [EventController::class, 'destroy'])->name('event.destroy');
Route::get('/event/delete/{id}', [EventController::class, 'delete']);

//Team (list teams)
Route::get('/event/show/{id}', [TeamController::class, 'show'])->name('event.show');
Route::get('/team/create/{id}', [TeamController::class, 'create'])->name('team.create');
Route::post('/team/store/{id}', [TeamController::class, 'store']);
Route::get('/team/delete/{id}/{team_id}', [TeamController::class, 'delete']);

//Round
Route::get('/event/round/{id}', [RoundController::class, 'create'])->name('round.create');
Route::post('/event/round/store/{id}', [RoundController::class, 'store'])->name('round.store');






require __DIR__ . '/auth.php';
