<?php

use App\Http\Controllers\Api\ApiCeremonyController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/ceremonies', [ApiCeremonyController::class, 'index'])->name('ceremony.index');
    Route::delete('/ceremonies/{ceremony}', [ApiCeremonyController::class, 'destroy'])->name('ceremonies.destroy');
    Route::post('/ceremonies/form', [ApiCeremonyController::class, 'store'])->name('ceremonies.store');
    Route::patch('/ceremonies/form/{ceremony}', [ApiCeremonyController::class, 'update'])->name('ceremonies.update');
});
