<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/student',[StudentController::class, 'index']);
Route::get('/student/{id}',[StudentController::class, 'show']);
Route::post('/student',[StudentController::class, 'uni']);
Route::put('/student/{id}',[StudentController::class, 'update']);
Route::delete('/student/{id}',[StudentController::class, 'destroy']);

?>