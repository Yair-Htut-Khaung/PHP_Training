<?php
 
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Data\DataController;
use Illuminate\Support\Facades\Validator;

 
/**
 * Show Task Dashboard
 */
Route::get('/', function ()
{
  $tasks = Task::orderBy('created_at', 'asc')->get();

  return view('tasks', [
      'tasks' => $tasks
  ]);
});

 
/**
 * Add New Task
 */
Route::get('/task', function (Request $request)
{
  $validator = Validator::make($request->all(), [
      'name' => 'required|max:255',
  ]);

  if ($validator->fails()) {
      return redirect('/')
          ->withInput()
          ->withErrors($validator);
  }

  $task = new Task;
  $task->name = $request->name;
  $task->save();

  return redirect('/');
});


 
/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task)
{
  $task->delete();

  return redirect('/');
});


// edit 

Route::get('/task/{task}/edit', function ($id)
{
  $post = Task::find($id);
  return view('update', compact('post'));
});



Route::post('/task/{task}/updatequery', function (Request $request, $id)
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

    Task::find($id)->Update([

        'name' => $request->name
    ]);
  
    return redirect('/')->with('successAlert', 'You have successfully updated');
  }


});


