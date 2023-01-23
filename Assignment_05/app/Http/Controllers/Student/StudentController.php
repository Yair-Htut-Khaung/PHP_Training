<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;
use App\Models\Major;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

use Illuminate\Support\Facades\Storage;
use PDF;
use Mail;

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

    public function StudentSearch()
    {
    
        
        $students = $this->studentServiceInterface->StudentSearch();

        return view('index_students',compact('students'));
        

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
    public function ImportFile()
    {
        $this->studentServiceInterface->ImportFile();
        return redirect('/');
    }

    public function ExportFile()
    {
        return Excel::download(new UsersExport, 'students.pdf');

    }
    public function sendMailWithPDF()
    {   
        //Calling a method that is from the OtherController
        
        $data["email"] = 'shinoharaakira35@gmail.com' ;
        Storage::disk('local')->put('example.txt', 'Contents');
        $data["title"] = "We have send to you a pdf file format";
        $data["body"] = Excel::download(new UsersExport, 'students.pdf');

        //app('App\Http\Controllers\Student\StudentController')->ExportFile();

        $pdf = PDF::loadView('mail', $data);
        echo asset('storage/file.txt');


        //Mail::send('mail', $data, function ($message) use ($data, $pdf) {
        //    $message->to($data["email"], $data["email"])
        //        ->subject($data["title"])
        //        ->attachData($pdf->output(), "students.pdf");
        //});
//
        Mail::send('mail', $data, function($message) use ($data, $pdf) {
            $message->to($data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "test.pdf");
           
        });
//        Mail::send('mail', $data, function($message)use($data, $files) {
//            $message->to($data["email"])
//                    ->subject($data["title"]);
// 
//            foreach ($files as $file){
//                $message->attach($file);
//            }
//            
//        });

        return redirect('/');
    }
}
