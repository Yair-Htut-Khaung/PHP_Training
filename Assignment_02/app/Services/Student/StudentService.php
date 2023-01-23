<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
  public function showTasks()
  {
    $tasks = $this->dataDao->showTasks();
    return $tasks;
  }


     /**
   * To save post
   * @param Request $request request with inputs
   * @return Object $post saved post
   */
  public function studentList()
  {
    $students = $this->dataDao->studentList();
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
  public function AddTasks(Request $request)
  {
    $post = $this->dataDao->AddTasks($request);
    
    return $post;
  }

  public function DeleteTasks($studentid)
  {
  
    $post = $this->dataDao->DeleteTasks($studentid);
    return $post;
  }


  public function PassIdTasks($studentdata)
  { 

    $post = $this->dataDao->PassIdTasks($studentdata);
    return $post;
  }

  public function UpdateTasks(Request $request, $id)
  {
     $post = $this->dataDao->UpdateTasks($request, $id);

     return $post;

     
  }


}