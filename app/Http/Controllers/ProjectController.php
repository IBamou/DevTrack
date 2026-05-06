<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Project::class);

        $projects = Project::where('created_by', Auth::id())
            ->orWhereHas('collaborators', function ($query) {
                $query->where('user_id', Auth::id());
            });

        if ($request->has('search') && ! empty($request->search)) {
            $projects = $projects->where('title', 'LIKE', "%{$request->search}%");
        }

        if ($request->has('filter') && $request->filter === 'archived') {
            $projects = $projects->onlyTrashed();
        }

        if ($request->has('sort') && $request->sort === 'oldest') {
            $projects = $projects->orderBy('created_at');
        } else {
            $projects = $projects->orderByDesc('created_at');
        }

        $projects = $projects->paginate(6);

        return view('projects.index', compact('projects'));
    }

    public function archives(Request $request)
    {
        $this->authorize('viewAnyArchived', Project::class);

        $projects = Project::onlyTrashed()
            ->where('created_by', Auth::id())
            ->paginate(6);

        return view('projects.archives', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Project::class);

        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $this->authorize('create', Project::class);

        $data = $request->validated();

        $project = Project::create([
            ...$data,
            'created_by' => Auth::id(),
        ]);

        $project->collaborators()->attach(Auth::id(), ['role' => 'admin']);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $data = $request->validated();

        $project->update($data);

        return redirect()->route('projects.index');
    }

    /**
     * SoftDelete the specified resource from storage.
     */
    public function archive(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect()->route('projects.index');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Project $project)
    {
        $this->authorize('restore', $project);

        $project->restore();
        return redirect()->route('projects.index');
    }

    /**
     * ForceDelete the specified resource from storage.
     */
    public function forceDelete(Project $project)
    {
        $this->authorize('forceDelete', $project);

        $project->forceDelete();
        return redirect()->route('projects.index');
    }

    /**
     * Add a collaborator to the project.
     */
    public function addCollaborator(Request $request, Project $project)
    {
        $this->authorize('update', $project);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string',
        ]);

        $project->collaborators()->attach($request->user_id, ['role' => $request->role]);

        return back();
    }

    public function removeCollaborator(Project $project, User $user)
    {
        $this->authorize('update', $project);

        $project->collaborators()->detach($user->id);

        return back();
    }
}
