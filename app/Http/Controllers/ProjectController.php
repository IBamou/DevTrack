<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projects = Project::query();

        if ($request->has('search') && ! empty($request->search)) {
            $projects = $projects->where('title', 'LIKE', "%{$request->search}%");
        }

        if ($request->has('sort') && $request->sort === 'oldest') {
            $projects = $projects->orderBy('created_at');
        } else {
            $projects = $projects->orderByDesc('created_at');
        }

        $projects = $projects->paginate(6);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $data =  $request->validated();

        Project::create([
            ...$data,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        if ($project->created_by !== Auth::id()) {
            abort(403);
        }

        $data = $request->validated();

        $project->update($data);

        return redirect()->route('projects.index');
    }

    /**
     * SoftDelete the specified resource from storage.
     */
    public function archive(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Project $project)
    {
        $project->restore();
        return redirect()->route('projects.index');
    }

    /**
     * ForceDelete the specified resource from storage.
     */
    public function forceDelete(Project $project)
    {
        $project->forceDelete();
        return redirect()->route('projects.index');
    }
}
