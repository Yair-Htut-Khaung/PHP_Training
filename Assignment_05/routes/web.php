<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Major\MajorController;
use App\Http\Controllers\Student\StudentController;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Models\Major;
use App\Modes\Students;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TestController;



/**
 * Show Student Dashboard
 */



/**
 * Show Add Student page
 */
Route::get('/student_add', [StudentController::class, 'ShowStudents']);

/**
 * Add Student
 */
Route::get('/create_students', [StudentController::class, 'AddStudents']);

/**
 * Student List
 */
Route::get('/student', [StudentController::class, 'StudentList']);

/**
 * Delete Student
 */
Route::get('/studentdel/{studentid}', [StudentController::class, 'DeleteStudent']);

/**
 * Edit Student
 */
Route::get('/studentupdate/{student}', [StudentController::class, 'PassIdStudent']);



Route::post('/student/{student}/updatequery', [StudentController::class, 'UpdateStudent']);


// Major 

/**
 * Show Student Dashboard
 */
Route::get('/major', [MajorController::class, 'ShowMajors']);

Route::get('/linkmajorcreate', function () {
    return view('create_majors');
});

/**
 * Add Major
 */
Route::get('/create_majors', [MajorController::class, 'AddMajor']);

/**
 * Delete Major
 */
Route::get('/major/{major}', [MajorController::class, 'DeleteMajor']);


/**
 * Edit Major
 */
Route::get('/major/{major}/edit', [MajorController::class, 'PassIdMajor']);


Route::post('/major/{major}/updatequery', [MajorController::class, 'UpdateMajor']);


Route::get('/', function () {
    $majors = Major::all();
    return view('index_students', [
        'students' => App\Models\User::all()
        


    ]);
});
// Route::get('import', [StudentController::class, 'MainVisual']);


// file export 

Route::get('export-csv', [StudentController::class, 'ExportFile']);

// file import 

Route::post('import', [StudentController::class, 'ImportFile']);


Route::get('/studentsearch', [StudentController::class, 'StudentSearch']);

// Send mail 

Route::get('/send-email', [TestController::class, 'sendMailWithPDF']);

