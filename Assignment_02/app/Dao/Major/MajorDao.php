<?php

namespace App\Dao\Major;


use App\Models\Task;
use App\Models\Major;
use App\Contracts\Dao\Major\MajorDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Data accessing object for post
 */
class MajorDao implements MajorDaoInterface
{
    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function showTasks()
    {   
        $tasks = Major::orderBy('created_at', 'asc')->get();
     
            return $tasks;
    
    }

    public function AddTasks(Request $request)
    {


        $task = new Major;
        $task->name = $request->name;
        $task->save();

    }
    public function DeleteTasks($task)
    {
        Major::find($task)->delete();


        return redirect('/major');
    }
    public function PassIdTasks($task)
    {
        $post = Major::find($task);
        
        return $post;
    }
    public function UpdateTasks(Request $request,  $id)
    {

     
        Major::find($id)->update([
    
            'name' => $request->name
        ]);
     

    }
   
}
