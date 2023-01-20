<?php

namespace App\Http\Controllers\Data;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Data\DataServiceInterface;
use App\Contracts\Dao\Data\DataDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
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
    public function __construct(DataServiceInterface $dataService)
    {
        $this->dataServiceInterface = $dataService;
    }

    public function showTasks()
    {
        $tasks = $this->dataServiceInterface->showTasks();
      
        return view('tasks', compact('tasks'));
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

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    } else {
        $task = $this->dataServiceInterface->AddTasks($request);
        $tasks = $this->dataServiceInterface->showTasks();
    
    }

        return redirect('/');
        // return view('tasks', compact('tasks'));

    }

    /**
     * To delete post by id
     * @return View post list
     */
    public function DeleteTasks($task)
    {
        
        $tasks = $this->dataServiceInterface->DeleteTasks($task);
        $tasks = $this->dataServiceInterface->showTasks();
        return view('tasks', compact('tasks'));
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
       
        return redirect('/')->with('successAlert','You have successfully updated');
        }
       
    }
}
