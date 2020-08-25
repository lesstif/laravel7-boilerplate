<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = ['id'];

    public function project_category()
    {
        return $this->belongsTo(Project::class, 'project_category_id', 'id');
    }
}
