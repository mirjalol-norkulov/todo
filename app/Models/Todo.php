<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * Class Todo
 * @package App\Models
 */
class Todo extends Model implements Sortable
{
    use SortableTrait;
    /**
     * @var array
     */
    protected $fillable = [
        'task', 'due_date', 'done', 'parent_id', 'sub_tasks',
        'order', 'user_id'
    ];

    /**
     * @var array
     */
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true
    ];

    /**
     * @var array
     */
    protected $casts = [
        'sub_tasks' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function buildSortQuery()
    {
        return static::query()->where('user_id', $this->user_id);
    }
}
