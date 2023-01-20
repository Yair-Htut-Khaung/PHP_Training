<?php

namespace App\Dao\Major;


use App\Models\Major;
use App\Contracts\Dao\Major\MajorDaoInterface;
use Illuminate\Http\Request;


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
    public function ShowMajors()
    {
        $majors = Major::orderBy('created_at', 'asc')->get();

        return $majors;
    }

    public function AddMajor(Request $request)
    {


        $major = new Major;
        $major->name = $request->name;
        $major->save();
    }
    public function DeleteMajor($major)
    {
        Major::find($major)->delete();


        return redirect('/major');
    }
    public function PassIdMajor($major)
    {
        $post = Major::find($major);

        return $post;
    }
    public function UpdateMajor(Request $request,  $id)
    {


        Major::find($id)->update([

            'name' => $request->name
        ]);
    }
}
