<?php

namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface StudentServiceInterface
{
  /**
   * To save post
   * @param Request $request request with inputs
   * @return Object $post saved post
   */
  public function showTasks();


    /**
   * To save post
   * @param Request $request request with inputs
   * @return Object $post saved post
   */
  public function studentList();

  public function MajorSelect();


    /**
   * To save post
   * @param Request $request request with inputs
   * @return Object $post saved post
   */
  public function AddTasks(Request $request);


  public function DeleteTasks($studentid);

  public function PassIdTasks($studentdata);

  public function UpdateTasks(Request $request, $id);

}