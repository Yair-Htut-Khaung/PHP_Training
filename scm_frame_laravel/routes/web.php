<?php
 
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Data\DataController;
use Illuminate\Support\Facades\Validator;

 
/**
 * Show Task Dashboard
 */
Route::get('/', [DataController::class, 'showTasks']);

 
/**
 * Add New Task
 */
Route::get('/task', [DataController::class, 'AddTasks']);


 
/**
 * Delete Task
 */
Route::get('/task/{task}', [DataController::class, 'DeleteTasks']);


// edit 

Route::get('/task/{task}/edit', [DataController::class, 'PassIdTasks']);


Route::post('/task/{task}/updatequery', [DataController::class, 'UpdateTasks']);

