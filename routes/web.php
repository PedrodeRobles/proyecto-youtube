<?php

use App\Http\Controllers\ComentaryController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Models\Comentary;

Route::get('/', [PageController::class, 'home']);
Route::get('video/{video}', [PageController::class, 'show'])->name('video');
// Probando comentarios
Route::post('video/{video}', [ComentaryController::class, 'store'])->middleware('auth');
Route::put('video/{video}', [ComentaryController::class, 'update'])->middleware('auth');
Route::delete('video/{video}', [ComentaryController::class, 'destroy'])->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('videos', VideoController::class)
    ->except('show')
    ->middleware('auth');
