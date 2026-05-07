<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCollaboratorRequest;
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

        $query = Project::query()
            ->where(function ($q) {
                $q->where('created_by', Auth::id())
                  ->orWhereHas('collaborators', function ($sub) {
                      $sub->where('user_id', Auth::id());
                  });
            });

        if ($request->filter === 'archived') {
            $query->onlyTrashed();
        } elseif ($request->filter === 'active') {
            $query->withoutTrashed();
        }

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'LIKE', "%{$request->search}%")
                  ->orWhere('description', 'LIKE', "%{$request->search}%");
            });
        }

        if ($request->sort === 'oldest') {
            $projects = $query->orderBy('created_at')->paginate(6);
        } else {
            $projects = $query->orderByDesc('created_at')->paginate(6);
        }

        return view('projects.index', compact('projects'));
    }

    /**
     * Display archived projects.
     */
    public function archives()
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
    public function show(Request $request, Project $project)
    {
        $this->authorize('view', $project);

        $filter = $request->query('filter', 'all');
        $tasks = $project->tasks();

        switch ($filter) {
            case 'my':
                $tasks = $tasks->where('collaborator_id', Auth::id());
                break;
            case 'todo':
                $tasks = $tasks->where('status', 'todo');
                break;
            case 'in_progress':
                $tasks = $tasks->where('status', 'in_progress');
                break;
            case 'done':
                $tasks = $tasks->where('status', 'done');
                break;
        }

        $tasks = $tasks->get();

        return view('projects.show', compact('project', 'tasks', 'filter'));
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

        return redirect()->route('projects.show', $project)->with('success', 'Project updated successfully.');
    }

    /**
     * Add a collaborator to the project.
     */
    public function addCollaborator(AddCollaboratorRequest $request, Project $project)
    {
        $this->authorize('addCollaborator', $project);
        
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return back()->with('error', 'User not found. Please enter a valid email address.');
        }

        if ($project->collaborators()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'This user is already a collaborator.');
        }

        $project->collaborators()->attach($user->id, ['role' => 'Member']);

        return back()->with('success', 'User added successfully.');
    }

    public function removeCollaborator(Project $project, User $user)
    {
        $this->authorize('addCollaborator', $project);

        $project->collaborators()->detach($user->id);

        return back();
    }

    public function archive(Project $project)
    {
        $this->authorize('delete', $project);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project archived successfully.');
    }

    public function restore(Project $project){
        $this->authorize('restore', $project);
        $project->restore();
        return redirect()->route('projects.index')->with('success', 'Project restored successfully.');
    }

    public function forceDelete(Project $project){
        $this->authorize('forceDelete', $project);
        $project->forceDelete();
        return redirect()->route('projects.index')->with('success', 'Project deleted permanently.');
    }
}
