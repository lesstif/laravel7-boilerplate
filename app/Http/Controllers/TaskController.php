<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Transformers\ProjectTransformer;
use App\Transformers\TaskStatusTransformer;
use App\Transformers\TaskTransformer;
use Auth;
use Cache;
use Illuminate\Http\Request;
use Jenssegers\Optimus\Optimus;

class TaskController extends Controller
{
    public function list(Request $request)
    {
        $user = Auth::user();

        $tasks = Task::where('assignee_id', $user->id)->get();

        return fractal($tasks, new TaskTransformer())->toArray();

    }

    /**
     * @param Request $request
     * @param int $id
     */
    public function viewEditForm(Request $request, int $id,  Optimus $optimus)
    {
        $orig_id = $optimus->decode($id);

        $task = Task::find($orig_id);

        $task_statuses = get_all_models_from_cache_or_put('task_statuses.all', TaskStatus::class);
        $projects       = get_all_models_from_cache_or_put('projects.all', Project::class);

        return view('tasks.edit')
            ->with('task', fractal($task, new TaskTransformer())->toArray())
            ->with('task_statuses', fractal($task_statuses, new TaskStatusTransformer())->toArray())
            ->with('projects', fractal($projects, new ProjectTransformer())->toArray())
            ;
    }

    public function view(Request $request, int $id,  Optimus $optimus)
    {
        $orig_id = $optimus->decode($id);

        $task = Task::find($orig_id);

        return fractal($task, new TaskTransformer())->toArray();
    }
}
