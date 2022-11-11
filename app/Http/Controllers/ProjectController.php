<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

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
            'status' => 'nullable',
            'client_id' => ['required', Rule::exists('clients', 'id')]
        ]);
    }
}
