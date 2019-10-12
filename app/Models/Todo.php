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
    protected $fillable = ['task', 'due_date', 'parent_id'];

    /**
     * @var array
     */
    protected $casts = [
        'due_date' => 'datetime'
    ];

    /**\
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subTasks()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
