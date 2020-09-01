<?php

namespace App\Transformers;

use App\Models\Task;
use League\Fractal\TransformerAbstract;

class TaskTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Task $task)
    {
        return [
            'id'      => (int) $task->id,
            'name'   => $task->name,
            'created_at'    => $task->created_at,
            'project'  => [
                'id' => $task->project->id,
                'name'  => $task->project->name,
            ],
            'status'   => [
                'id' => $task->status->id,
                'name'  => $task->status->name,
            ]
        ];
    }
}
