<?php

namespace App\Criterias\Todos;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterByUserCriteria
 * @package App\Criterias\Todos
 */
class FilterByUserCriteria implements CriteriaInterface
{
    /**
     * @var Request
     */
    private $request;

    /**
     * FilterByUserCriteria constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('user_id', $this->request->user()->id);
        return $model;
    }
}
