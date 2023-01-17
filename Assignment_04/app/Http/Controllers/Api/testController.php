<?php

namespace App\Http\Controllers\Api;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;









class testController extends Controller
{



   

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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'major' => 'required'
        ],$messages);

        if($validator->fails())
        {
            return response()->json(['msg' => $validator->errors()],200);
        } else {
            $major = Major::all();
            $student = new Student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->address = $request->address;
            $student->major = $request->major;

            $student->save();
            return response()->json([$student,$major,'msg' => 'Data created Successfully'],200);
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($search_text)
    {

        $majors = Major::all();
       $student = DB::table('majors')
       ->leftjoin('students', 'students.major', '=', 'majors.id')
       ->where('students.name','=', $search_text )
       ->orWhere('majors.name','=', $search_text)
       ->orWhere('students.email','=', $search_text)
       ->get();


       foreach($majors as $major)
       {
           $majorlist[] = $major->name;
       }
       foreach($student as $stu){

                   $stu->major = $majorlist[($stu->major)-1];
                   

        
       }
       return response()->json([$student, $majors, 'msg' => 'Data created Successfully'],200);
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
        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'major' => $request->major,
        ]);
        $major = Major::all();
        return response()->json([$major,'msg'=> 'Update Success'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['deletePost' => $student, 'msg' => 'Delete Success'],200);

    }
}
