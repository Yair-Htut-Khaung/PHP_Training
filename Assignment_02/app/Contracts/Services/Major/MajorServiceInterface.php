<?php

namespace App\Contracts\Services\Major;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface MajorServiceInterface
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
  public function AddTasks(Request $request);


  public function DeleteTasks($task);

  public function PassIdTasks($task);

  public function UpdateTasks(Request $request, $id);

}