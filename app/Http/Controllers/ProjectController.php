<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function list(Request $request)
    {
        return Project::all();
    }

    public function view(Request $request, int $id)
    {
        return Project::where('id', $id)->with('project_category')->first();
    }
}
