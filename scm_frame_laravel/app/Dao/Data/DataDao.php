<?php

namespace App\Dao\Data;

use App\Models\Task;
use App\Contracts\Dao\Data\DataDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Data accessing object for post
 */
class DataDao implements DataDaoInterface
{
    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function showTasks()
    {   
        $tasks = Task::orderBy('created_at', 'asc')->get();
     
            return $tasks;
    
    }

    public function AddTasks(Request $request)
    {


        $task = new Task;
        $task->name = $request->name;
        $task->save();

    }
    public function DeleteTasks($task)
    {
        Task::find($task)->delete();


        return redirect('/');
    }
    public function PassIdTasks($task)
    {
        $post = Task::find($task);
        
        return $post;
    }
    public function UpdateTasks(Request $request,  $id)
    {

     
        Task::find($id)->update([
    
            'name' => $request->name
        ]);
     

    }
   
}
