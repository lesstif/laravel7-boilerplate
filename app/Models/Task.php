<?php

namespace App\Models;

use App\Models\TaskStatus;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['reminder_at', 'due_date'];

    protected $with = ['project', 'status', ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id', 'id');
    }

}
