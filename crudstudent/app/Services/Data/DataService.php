<?php

namespace App\Services\Data;

use App\Contracts\Dao\Data\DataDaoInterface;
use App\Contracts\Services\Data\DataServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * User Service class
 */
class DataService implements DataServiceInterface
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
  public function __construct(DataDaoInterface $dataDao)
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
  public function AddTasks(Request $request)
  {
    $post = $this->dataDao->AddTasks($request);
    
    return $post;
  }

  public function DeleteTasks($task)
  {
    $post = $this->dataDao->DeleteTasks($task);
    return $post;
  }


  public function PassIdTasks($task)
  { 
  
    $post = $this->dataDao->PassIdTasks($task);
    return $post;
  }

  public function UpdateTasks(Request $request, $id)
  {
     $post = $this->dataDao->UpdateTasks($request, $id);
     return $post;
     
  }


}


 

