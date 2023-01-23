<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Major;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Major\MajorServiceInterface;
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

    public function ShowMajors()
    {

        $majorlist = $this->dataServiceInterface->ShowMajors();

        return view('index_majors', compact('majorlist'));
    }


    /**
     * To submit post create confirm view
     * @param Request $request
     * @return View post list
     */

    public function AddMajor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $this->dataServiceInterface->AddMajor($request);
            $this->dataServiceInterface->ShowMajors();
            return redirect('/major');
        }
    }

    /**
     * To delete post by id
     * @return View post list
     */
    public function DeleteMajor($major)
    {

        $this->dataServiceInterface->DeleteMajor($major);
        $major = $this->dataServiceInterface->ShowMajors();
        return redirect('/major');
    }
    public function PassIdMajor($major)
    {

        $post = $this->dataServiceInterface->PassIdMajor($major);


        return view('update', compact('post'));
    }
    public function UpdateMajor(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        } else {

            $this->dataServiceInterface->UpdateMajor($request, $id);

            return redirect('/major')->with('successAlert', 'You have successfully updated');
        }
    }
}
