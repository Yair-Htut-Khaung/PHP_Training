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
    public function ShowMajors();


    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function AddMajor(Request $request);


    public function DeleteMajor($major);

    public function PassIdMajor($major);

    public function UpdateMajor(Request $request, $id);
}
