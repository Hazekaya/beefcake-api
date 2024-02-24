<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;


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

Route::get('exercises', [ExerciseController::class, 'index']);
Route::get('exercises/{id}', [ExerciseController::class, 'show']);
Route::post('exercises', [ExerciseController::class, 'store']);
Route::put('exercises/{id}', [ExerciseController::class, 'update']);
Route::delete('exercises/{id}', [ExerciseController::class, 'destroy']);
