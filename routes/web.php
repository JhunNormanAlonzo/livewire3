<?php

use App\Livewire\Welcome;
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

Route::get('/', Welcome::class);


Route::group(['middleware' => ['guest']], function (){
    Route::get('rooms/', App\Livewire\Room\Index::class)->name('rooms.index');
    Route::get('room-statuses/', App\Livewire\RoomStatus\Index::class)->name('room-statuses.index');
});
