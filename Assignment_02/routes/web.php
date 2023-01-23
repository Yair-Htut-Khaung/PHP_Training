<?php

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Data\DataController;
use App\Http\Controllers\Major\MajorController;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

use App\Exports\UsersExport;

 
/**
 * Show Student Dashboard
 */



/**
 * Show Add Student page
 */
Route::get('/student_add',[StudentController::class, 'showTasks']);

/**
 * Add Student
 */
Route::get('/create_students',[StudentController::class, 'AddTasks']);

/**
 * Student List
 */
Route::get('/student',[StudentController::class, 'studentList']);

/**
 * Delete Student
 */
Route::get('/studentdel/{studentid}', [StudentController::class, 'DeleteTasks']);

/**
 * Edit Student
 */
Route::get('/studentupdate/{student}', [StudentController::class, 'PassIdTasks']);



Route::post('/student/{task}/updatequery', [StudentController::class, 'UpdateTasks']);


// Major 

/**
 * Show Student Dashboard
 */
Route::get('/major',[MajorController::class, 'showTasks']);

Route::get('/linkmajorcreate', function (Request $request)
{
    return view('create_majors');


});

/**
 * Add Major
 */
Route::get('/create_majors',[MajorController::class, 'AddTasks']);

/**
 * Delete Major
 */
Route::get('/major/{task}', [MajorController::class, 'DeleteTasks']);


/**
 * Edit Major
 */
Route::get('/major/{task}/edit', [MajorController::class, 'PassIdTasks']);


Route::post('/major/{task}/updatequery', [MajorController::class, 'UpdateTasks']);

Route::get('/', function () {
    
    return view('welcome',[
        'users' => App\Models\User::all()
    ]);
});



Route::post('import', function () {
    
    $fileName = time().'_'.request()->file->getClientOriginalName();
    request()->file('file')->storeAs('reports', $fileName, 'public');
    
    Excel::import(new UsersImport, request()->file('file'));
    return redirect()->back()->with('success','Data Imported Successfully');
});

Route::get('export-csv', function () {
    return Excel::download(new UsersExport, 'students.csv');
});




