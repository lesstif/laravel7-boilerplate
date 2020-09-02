<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Transformers\ProjectTransformer;
use Illuminate\Http\Request;
use Jenssegers\Optimus\Optimus;

class ProjectController extends Controller
{
    /**
     * ProjectController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $projects = Project::all();

        return response(
            fractal($projects, new ProjectTransformer())->toArray()
            ,200
        );
    }

    /**
     * @param Request $request
     * @param int $id
     * @return Project|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function view(Request $request, int $id,  Optimus $optimus)
    {
        $orig_id = $optimus->decode($id);
        $project = Project::where('id', $orig_id)->with('project_category')->first();

        return response(
            fractal($project, new ProjectTransformer())->toArray(),
            200
        );
    }
}
