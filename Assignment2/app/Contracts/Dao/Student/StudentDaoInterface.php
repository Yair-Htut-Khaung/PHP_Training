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
}
