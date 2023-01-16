<?php

namespace App\Dao\Student;


use App\Models\Task;
use App\Models\Major;
use App\Models\joinstudentmajor;
use App\Models\Student;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Data accessing object for post
 */
class StudentDao implements StudentDaoInterface
{
    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function ShowStudents()
    {   
        $tasks = Major::get();
     
            return $tasks;
    
    }

        /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function StudentList()
    {   
        $student = Student::all();
    
        return $student;
    
    }

    

    public function AddStudents(Request $request)
    {


        $task = new Student;
        $task->name = $request->name;
        $task->email = $request->email;
        $task->phone = $request->phone;
        $task->address = $request->address;

       
        foreach(($request->majors) as $major){

        $task->major = $major;
        
        }

        $task->save();

    }
    public function DeleteStudent($studentid)
    {
        Student::find($studentid)->delete();


        return redirect('/student');
    }
    public function PassIdStudent($studentdata)
    {

        $student = Student::find($studentdata);
        
        return $student;
       
    }
    public function MajorSelect()
    {
        $majors = Major::all();
        return $majors;
    }
    public function UpdateStudent(Request $request,  $id)
    {
        if(($request->majors) == null){
            dd("null");
        }
        foreach(($request->majors) as $major){
           
            $task = $major;
         
            
        $student = Student::find($id);
         $student->name = $request->name;
         $student->email = $request->email;
         $student->phone = $request->phone;
         $student->address = $request->address;
         $student->major = $task;

         $student->update();


    }
     

    }
   
}
