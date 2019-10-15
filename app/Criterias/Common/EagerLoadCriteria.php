<?php

namespace App\Criterias\Common;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class EagerLoadCriteria
 * @package App\Criterias\Common
 */
class EagerLoadCriteria implements CriteriaInterface
{
    /**
     * @var array|string
     */
    private $relations;

    /**
     * EagerLoadCriteria constructor.
     * @param array|string $relations
     */
    public function __construct($relations)
    {
        $this->relations = $relations;
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
        $model->with($this->relations);
        return $model;
    }
}
