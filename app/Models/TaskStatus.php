<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    protected $guarded = ['id'];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'task_id', 'id');
    }
}
