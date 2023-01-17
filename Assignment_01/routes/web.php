<?php




use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Major\MajorController;
use App\Http\Controllers\Student\StudentController;


 
/**
 * Show Student Dashboard
 */
Route::get('/', function(){
    return redirect('/student');
});


/**
 * Show Add Student page
 */
Route::get('/student_add',[StudentController::class, 'ShowStudents']);

/**
 * Add Student
 */
Route::get('/create_students',[StudentController::class, 'AddStudents']);

/**
 * Student List
 */
Route::get('/student',[StudentController::class, 'StudentList']);

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
Route::get('/major',[MajorController::class, 'ShowMajors']);

Route::get('/linkmajorcreate', function ()
{
    return view('create_majors');


});

/**
 * Add Major
 */
Route::get('/create_majors',[MajorController::class, 'AddMajor']);

/**
 * Delete Major
 */
Route::get('/major/{major}', [MajorController::class, 'DeleteMajor']);


/**
 * Edit Major
 */
Route::get('/major/{major}/edit', [MajorController::class, 'PassIdMajor']);


Route::post('/major/{major}/updatequery', [MajorController::class, 'UpdateMajor']);


