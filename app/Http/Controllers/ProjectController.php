<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use App\Enums\ProjectStatusEnum;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', ['projects' => Project::with('client')->get()]);
    }

    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }

    public function create()
    {
        return view('projects.create', ['clients' => Client::all()]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255|unique:projects,slug',
            'description' =>'required|min:3|max:255',
            'deadline' => 'required|date',
            'client_id' => ['required', Rule::exists('clients', 'id')]
        ]);

        if(request('status')){
            $attributes['status'] = ProjectStatusEnum::Finished;
        }

        Project::create($attributes);

        return redirect('/projects/');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'clients' => Client::all()
        ]);
    }

    public function update(Project $project)
    {
        $attributes = request()->validate([
            'title' => 'required|min:3|max:255',
            'slug' => ['required', Rule::unique('projects', 'slug')->ignore($project)],
            'description' =>'required|min:3|max:255',
            'deadline' => 'required|date',
            'client_id' => ['required', Rule::exists('clients', 'id')]
        ]);

        if(request('status') == 'finished'){
            $attributes['status'] = ProjectStatusEnum::Finished;
        } else {
            $attributes['status'] = ProjectStatusEnum::InProgress;
        }

        $project->update($attributes);

        return redirect('/projects/');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
