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
    public function index() : ProjectCollection
    {
        return new ProjectCollection(Project::with(['client', 'employees'])->paginate(5));
    }

    public function show(Project $project) : ProjectResource
    {
        return new ProjectResource($project);
    }

    public function store(ValidateProjectRequest $request, CreateModel $createModel) : ProjectResource
    {
        $project = $createModel->handle(Project::class, $request);

        return new ProjectResource($project);
    }

    public function update(ValidateProjectRequest $request, Project $project, UpdateModel $updateModel) : ProjectResource
    {
        $project = $updateModel->handle($project, $request);

        return new ProjectResource($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json(['status' =>'project deleted']);
    }

    public function search(Request $request) : ProjectResource
    {
        $search = $request->get('search');

        $project = Project::query()
            ->where('title', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->first();

        return new ProjectResource($project);
    }
}
