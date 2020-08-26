<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['reminder_at', 'due_date'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

}
