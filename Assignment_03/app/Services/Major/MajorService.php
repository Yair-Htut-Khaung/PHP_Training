<?php

namespace App\Services\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;
use Illuminate\Http\Request;


/**
 * User Service class
 */
class MajorService implements MajorServiceInterface
{
    /**
     * user Dao
     */
    private $dataDao;

    /**
     * Class Constructor
     * @param UserDaoInterface
     * @return
     */
    public function __construct(MajorDaoInterface $dataDao)
    {
        $this->dataDao = $dataDao;
    }

    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function ShowMajors()
    {
        $majors = $this->dataDao->ShowMajors();
        return $majors;
    }

    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function AddMajor(Request $request)
    {
        $post = $this->dataDao->AddMajor($request);

        return $post;
    }

    public function DeleteMajor($major)
    {
        $post = $this->dataDao->DeleteMajor($major);
        return $post;
    }


    public function PassIdMajor($task)
    {

        $post = $this->dataDao->PassIdMajor($task);
        return $post;
    }

    public function UpdateMajor(Request $request, $id)
    {
        $post = $this->dataDao->UpdateMajor($request, $id);
        return $post;
    }
}
