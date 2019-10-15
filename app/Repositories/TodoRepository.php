<?php

namespace App\Repositories;

use App\Models\Todo;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class TodoRepository
 * @package App\Repositories
 */
class TodoRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Todo::class;
    }

    public function setNewOrder($ids, int $startOrder = 1, string $primaryKeyColumn = null)
    {
        $this->model->setNewOrder($ids, $startOrder, $primaryKeyColumn);
    }
}
