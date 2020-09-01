<?php

namespace App\Transformers;

use App\Models\TaskStatus;
use League\Fractal\TransformerAbstract;

class TaskStatusTransformer extends TransformerAbstract
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
     * @param TaskStatus $status
     * @return array
     */
    public function transform(TaskStatus $status)
    {
        return [
            'id'      => (int) $status->id,
            'name'   => $status->name,
            'created_at'    => $status->created_at,
        ];
    }
}
