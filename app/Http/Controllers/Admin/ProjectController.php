<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateModel;
use App\Actions\UpdateModel;
use App\Actions\ValidateProject;
use App\Enums\ProjectStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Models\Client;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', ['projects' => Project::with('client')->simplePaginate(10)]);
    }

    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }

    public function create()
    {
        $this->authorize('create', Project::class);

        return view('projects.create', ['clients' => Client::all()]);
    }

    public function store(Project $project, ValidateProjectRequest $request, CreateModel $createModel)
    {
        $this->authorize('create', Project::class);

        $createModel->handle(Project::class, $request);

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        $this->authorize('update', Project::class);

        return view('projects.edit', [
            'project' => $project,
            'clients' => Client::all()
        ]);
    }

    public function update(Project $project, ValidateProjectRequest $request, UpdateModel $updateModel)
    {
        $this->authorize('update', Project::class);

        $updateModel->handle($project, $request);

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', Project::class);

        $project->delete();

        return redirect()->route('projects.index');
    }
}
