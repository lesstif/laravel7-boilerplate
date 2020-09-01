<?php

namespace App\Transformers;

use App\Models\Project;
use Jenssegers\Optimus\Optimus;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
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
     * @param Project $project
     * @return array
     */
    public function transform(Project $project)
    {
        $optimus = app()->make(Optimus::class);

        return [
            'id'      => $optimus((int) $project->id),
            'name'   => $project->name,
            'created_at'    => $project->created_at,
            'project_category'  => [
                'id' => $project->project_category->id,
                'name'  => $project->project_category->name,
            ],
        ];
    }
}
