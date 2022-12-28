<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * data interface
     */
    private $studentServiceInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentServiceInterface $dataService)
    {
        $this->studentServiceInterface = $dataService;
    }


    public function ShowStudents()
    {

        $students = $this->studentServiceInterface->ShowStudents();

        return view('create_students', compact('students'));
    }


    // to show students list 
    public function StudentList()
    {

        $students = $this->studentServiceInterface->StudentList();


        return view('index_students', compact('students'));
    }


    /**
     * To submit post create confirm view
     * @param Request $request
     * @return View post list
     */

    public function AddStudents(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/student_add')
                ->withInput()
                ->withErrors($validator);
        } else {
            $this->studentServiceInterface->AddStudents($request);
            $this->studentServiceInterface->ShowStudents();
            return redirect('/student');
        }
    }

    /**
     * To delete post by id
     * @repost list
     */
    public function DeleteStudent($studentid)
    {

        $this->studentServiceInterface->DeleteStudent($studentid);
        $this->studentServiceInterface->ShowStudents();
        return redirect('/student');
    }
    public function PassIdStudent($studentdata)
    {

        $student = $this->studentServiceInterface->PassIdStudent($studentdata);
        $majors = $this->studentServiceInterface->MajorSelect();

        return view('update_student', compact('student', 'majors'));
    }
    public function UpdateStudent(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {

            $this->studentServiceInterface->UpdateStudent($request, $id);

            return redirect('/student')->with('successAlert', 'You have successfully updated');
        }
    }
}
