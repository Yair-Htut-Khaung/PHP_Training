<?php


use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('index_students',StudentController::class);

Route::post('api/search/{searchtext}', [StudentController::class, 'search']);





