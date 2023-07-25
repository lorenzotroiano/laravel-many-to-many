<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;



class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('welcome', compact('projects'));
    }

    public function show($id)
    {

        $projects = Project::findOrFail($id);

        return view('show', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();
        return view('create', compact('types'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $project = Project::create($data);
        return redirect()->route('project.show', $project->id);
    }
}
