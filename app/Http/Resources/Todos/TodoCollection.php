<?php

namespace App\Http\Resources\Todos;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TodoCollection extends ResourceCollection
{
    /**
     * @var string
     */
    public $collects = Todo::class;
}
