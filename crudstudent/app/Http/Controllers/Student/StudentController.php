<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\joinstudentmajor;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
      /**
     * data interface
     */
    private $dataServiceInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentServiceInterface $dataService)
    {
        $this->dataServiceInterface = $dataService;
    }

    public function showTasks()
    {
        
        $tasks = $this->dataServiceInterface->showTasks();
      
        return view('create_students', compact('tasks'));
    }


    // to show students list 
    public function studentList()
    {
        
        $students = $this->dataServiceInterface->studentList();

            
            return view('index_students', compact('students'));  
       
    }
 

    /**
     * To submit post create confirm view
     * @param Request $request
     * @return View post list
     */

    public function AddTasks(Request $request)
    {           $validator = Validator::make($request->all(), [
        'name' => 'required|max:255', 
        'email' => 'required|max:255', 
        'phone' => 'required|max:255', 
        'address' => 'required|max:255', 
        'majros' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect('/student_add')
            ->withInput()
            ->withErrors($validator);
    } else {
        $tasks = $this->dataServiceInterface->AddTasks($request);
        $task = $this->dataServiceInterface->showTasks();
        return redirect('/student_add');
    
    }

    }

    /**
     * To delete post by id
     * @repost list
     */
    public function DeleteTasks($studentid)
    {   

        $students = $this->dataServiceInterface->DeleteTasks($studentid);
        $student = $this->dataServiceInterface->showTasks();
        return redirect('/student');
    }
    public function PassIdTasks($studentdata)
    {
        
        $student = $this->dataServiceInterface->PassIdTasks($studentdata);
        $majors = $this->dataServiceInterface->MajorSelect();
      
        return view('update_student', compact('student','majors'));
    }
    public function UpdateTasks(Request $request, $id)
    {   
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
     
        if ($validator->fails())
        {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        } else {

        $tasks = $this->dataServiceInterface->UpdateTasks($request, $id);
       
        return redirect('/student')->with('successAlert','You have successfully updated');
        }
       
    }
}
