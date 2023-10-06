<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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

Route::get('/ticket/create', [TicketController::class, 'create']);
Route::put('/ticket/delete', [TicketController::class, 'delete']);
Route::get('/ticket/edit', [TicketController::class, 'edit']);
Route::get('/ticket/see', [TicketController::class, 'see']);
Route::get('/ticket/seeAll', [TicketController::class, 'seeAll']);
