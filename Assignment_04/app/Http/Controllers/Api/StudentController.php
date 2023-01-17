<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class StudentController extends Controller
{

    private $studentServiceInterface;

    public function __construct(StudentServiceInterface $dataService)
    {
        $this->studentServiceInterface = $dataService;
    }


    public function index()
    {

        $student = $this->studentServiceInterface->index();

        return response()->json([$student, "msg" => "show all data"], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'major' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()], 200);
        } else {
            $major = Major::all();
            $student = $this->studentServiceInterface->store($request);
            $student->major = $request->major;
            $student->save();
            return response()->json([$student, $major, 'msg' => 'Data created Successfully'], 200);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $student = $this->studentServiceInterface->update($request, $id);

        $major = Major::all();
        return response()->json([$student, $major, 'msg' => 'Update Success'], 200);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search_text)
    {
        //check if route is from update or search
        $status = $_COOKIE['search'];
        if ($status == '0') {
            $student = Student::find($search_text);
            return response()->json($student, 200);
        } else if ($status == '1') {
            $student = $this->studentServiceInterface->show($search_text);
            return response()->json([$student, 'msg' => 'Data selected Successfully'], 200);
        }
    }

    // display the search result 
    public function search($search_text)
    {
        echo "we even here ?";
        $student = $this->studentServiceInterface->StudentSearch($search_text);

        return response()->json([$student, 'msg' => 'Data selected Successfully'], 200);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = $this->studentServiceInterface->delete($id);
        return response()->json(['deletePost' => $student, 'msg' => 'Delete Success'], 200);
    }
}
