<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;

/**
 * User Service class
 */
class StudentService implements StudentServiceInterface
{
    /**
     * user Dao
     */
    private $dataDao;

    /**
     * Class Constructor
     * @param UserDaoInterface
     * @return
     */
    public function __construct(StudentDaoInterface $dataDao)
    {
        $this->dataDao = $dataDao;
    }

    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function ShowStudents()
    {
        $tasks = $this->dataDao->ShowStudents();
        return $tasks;
    }

  

    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function StudentList()
    {
        $students = $this->dataDao->StudentList();
        return $students;
    }
    public function MajorSelect()
    {
        $majors = $this->dataDao->MajorSelect();
        return $majors;
    }



    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function AddStudents(Request $request)
    {
        $post = $this->dataDao->AddStudents($request);

        return $post;
    }

    public function DeleteStudent($studentid)
    {

        $post = $this->dataDao->DeleteStudent($studentid);
        return $post;
    }


    public function PassIdStudent($studentdata)
    {

        $post = $this->dataDao->PassIdStudent($studentdata);
        return $post;
    }

    public function UpdateStudent(Request $request, $id)
    {
        $post = $this->dataDao->UpdateStudent($request, $id);

        return $post;
    }
    public function StudentSearch()
    {
        $students = $this->dataDao->StudentSearch();
        return $students;
    }
        // Api relate section 

    public function index()
    {
        $student = $this->dataDao->index();
        return $student;
    }
    public function store(Request $request)
    {
        $student = $this->dataDao->store($request);
        return $student;
    }
    public function show($search_text)
    {
        $student = $this->dataDao->show($search_text);
        return $student;   
    }

    public function update(Request $request, $id)
    {
        $student = $this->dataDao->update($request, $id);
        return $student; 
    }

    public function delete($id)
    {
        $student = $this->dataDao->delete($id);
        return $student; 
    }

    // file importing 

    public function ImportFile()
    {
        $fileName = time() . '_' . request()->file->getClientOriginalName();
        request()->file('file')->storeAs('reports', $fileName, 'public');
    
        Excel::import(new UsersImport, request()->file('file'));
        return redirect()->back()->with('success', 'Data Imported Successfully');
    }
    
    // file exporting

    public function ExportFile()
    {
        return Excel::download(new UsersExport, 'students.pdf');
    }


}
