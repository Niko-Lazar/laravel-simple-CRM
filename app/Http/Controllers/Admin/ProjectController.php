<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ValidateModel;
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
        return view('projects.create', ['clients' => Client::all()]);
    }

    public function store(ValidateProjectRequest $request, ValidateModel $validateProject)
    {
        Project::create($validateProject->handle($request));

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'clients' => Client::all()
        ]);
    }

    public function update(Project $project, ValidateProjectRequest $request, ValidateModel $validateProject)
    {
        $project->update($validateProject->handle($request));

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
