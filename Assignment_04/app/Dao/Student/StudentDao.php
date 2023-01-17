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

    // Api relate section 

        public function index()
    {
       
        $student = Student::all();
        $majors = Major::all();

        
        
        foreach($majors as $major)
        {
            $majorlist[] = $major->name;
        }
        foreach($student as $stu){

                    $stu->major = $majorlist[($stu->major)-1];
                    

         
        }

        return $student;
    }
    public function store(Request $request)
    {

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;

        // $student->save();
        return $student;
    }
    public function show($search_text)
    {
        $majors = Major::all();
        $student = DB::table('majors')
        ->leftjoin('students', 'students.major', '=', 'majors.id')
        ->where('students.name','=', $search_text )
        ->orWhere('majors.name','=', $search_text)
        ->orWhere('students.email','=', $search_text)
        ->get();
 
 
        foreach($majors as $major)
        {
            $majorlist[] = $major->name;
        }
        foreach($student as $stu){
 
                    $stu->major = $majorlist[($stu->major)-1];
                    
 
         
        }
        return $student;
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'major' => $request->major,
        ]);
        return $student;
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return $student;
    }
   
}
