<?php

namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface StudentDaoInterface
{
    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function ShowStudents();


    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function StudentList();

    public function MajorSelect();


    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function AddStudents(Request $request);


    public function DeleteStudent($studentid);

    public function PassIdStudent($studentdata);

    public function UpdateStudent(Request $request, $id);

    public function StudentSearch();

    // api realte section 


    
    public function index();

    public function store(Request $request);

    public function show($search_text);

    public function update(Request $request, $id);

    public function delete($id);
}
