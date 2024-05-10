<?php

use App\Http\Controllers\Api\StudentController as ApiStudentController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/students', ApiStudentController::class);
Route::apiResource('/transactions', TransactionController::class);
