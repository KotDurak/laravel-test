<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get()->all();
        return view('projects', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.view', [
            'project'   => $project
        ]);
    }

    public function store(Request $request)
    {
        $validate = $this->validate($request, [
           'name'   => 'string|max:255|required',
           'description' => 'string|required'
        ]);

        if ($validate) {
            $project = new Project($request->post());
            $project->save();
            return redirect('projects');
        }
    }
}
