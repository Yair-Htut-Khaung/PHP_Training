<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Major;

use App\Models\Major;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Major\MajorServiceInterface;
use App\Contracts\Dao\Major\MajorDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MajorController extends Controller
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
    public function __construct(MajorServiceInterface $dataService)
    {
        $this->dataServiceInterface = $dataService;
    }

    public function showTasks()
    {
        
        $tasks = $this->dataServiceInterface->showTasks();
      
        return view('index_majors', compact('tasks'));
    }


    /**
     * To submit post create confirm view
     * @param Request $request
     * @return View post list
     */

    public function AddTasks(Request $request)
    {           $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails())
    {
        return redirect()->back()
        ->withInput()
        ->withErrors($validator);
    } else {
        $tasks = $this->dataServiceInterface->AddTasks($request);
        $task = $this->dataServiceInterface->showTasks();
        return redirect('/major');
    
    }
    }

    /**
     * To delete post by id
     * @return View post list
     */
    public function DeleteTasks($task)
    {
        
        $tasks = $this->dataServiceInterface->DeleteTasks($task);
        $task = $this->dataServiceInterface->showTasks();
        return redirect('/major');
    }
    public function PassIdTasks($task)
    {

        $post = $this->dataServiceInterface->PassIdTasks($task);

        
        return view('update', compact('post'));
    }
    public function UpdateTasks(Request $request, $id)
    {   
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
     
        if ($validator->fails())
        {
            return redirect()->back()
            ->withInput()
            ->withErrors($validator);
        } else {

        $tasks = $this->dataServiceInterface->UpdateTasks($request, $id);
       
        return redirect('/major')->with('successAlert','You have successfully updated');
        }
       
    }
}
