<?php

namespace App\Http\Resources\Todos;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Todo
 * @package App\Http\Resources\Todos
 */
class Todo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'task' => $this->task,
            'due_date' => $this->due_date,
            'done' => $this->done,
            'sub_tasks' => $this->sub_tasks,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
