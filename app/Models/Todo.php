<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Todo
 * @package App\Models
 */
class Todo extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['task', 'due_date', 'done', 'parent_id', 'sub_tasks'];

    /**
     * @var array
     */
    protected $casts = [
        'sub_tasks' => 'array'
    ];
}
