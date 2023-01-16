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

    public function ShowStudents()
    {

        $students = $this->dataServiceInterface->ShowStudents();

        return view('create_students', compact('students'));
    }


    // to show students list 
    public function StudentList()
    {

        $students = $this->dataServiceInterface->StudentList();


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
            $this->dataServiceInterface->AddStudents($request);
            $this->dataServiceInterface->ShowStudents();
            return redirect('/student');
        }
    }

    /**
     * To delete post by id
     * @repost list
     */
    public function DeleteStudent($studentid)
    {

        $this->dataServiceInterface->DeleteStudent($studentid);
        $this->dataServiceInterface->ShowStudents();
        return redirect('/student');
    }
    public function PassIdStudent($studentdata)
    {

        $student = $this->dataServiceInterface->PassIdStudent($studentdata);
        $majors = $this->dataServiceInterface->MajorSelect();

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

            $this->dataServiceInterface->UpdateStudent($request, $id);

            return redirect('/student')->with('successAlert', 'You have successfully updated');
        }
    }
}
