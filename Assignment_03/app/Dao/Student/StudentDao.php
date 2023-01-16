<?php

namespace App\Dao\Student;


use App\Models\Task;
use App\Models\Major;
use App\Models\joinstudentmajor;
use App\Models\Student;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
    public function StudentSearch(){

        $search_text = $_GET['search'];
      


        $students = DB::table('majors')
        ->leftjoin('students', 'students.major', '=', 'majors.id')
        ->where('students.name','=', $search_text )
        ->orWhere('majors.name','=', $search_text)
        ->orWhere('students.email','=', $search_text)
        ->get();


        return $students;
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


        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->major = $request->majors;

        $student->save();

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


         
            
        $student = Student::find($id);
         $student->name = $request->name;
         $student->email = $request->email;
         $student->phone = $request->phone;
         $student->address = $request->address;
         $student->major = $request->majors;

         $student->update();



     

    }
   
}
