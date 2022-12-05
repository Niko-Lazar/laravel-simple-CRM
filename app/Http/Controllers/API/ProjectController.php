<?php

namespace App\Http\Controllers\API;

use App\Actions\CreateModel;
use App\Actions\UpdateModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectCollection;

class ProjectController extends Controller
{
    public function index()
    {
        return new ProjectCollection(Project::all());
    }

    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    public function store(ValidateProjectRequest $request, CreateModel $createModel)
    {
        $project = $createModel->handle(Project::class, $request);

        return new ProjectResource($project);
    }

    public function update(ValidateProjectRequest $request, Project $project, UpdateModel $updateModel)
    {
        $project = $updateModel->handle($project, $request);

        return new ProjectResource($project);
    }
}
