<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\Collaborator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        $user = Auth::user();
        
        $activeProjects = Project::whereHas('collaborators', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->with(['tasks' => function ($query) {
            $query->select('id', 'project_id', 'status');
        }])
        ->withCount('tasks')
        ->get();

        $collaboratorIds = Collaborator::where('user_id', $user->id)->pluck('id');
        
        $myTasks = collect();
        if ($collaboratorIds->isNotEmpty()) {
            $myTasks = Task::whereIn('collaborator_id', $collaboratorIds)
                ->with('project:id,title')
                ->get();
        }

        $stats = [
            'activeProjects' => $activeProjects->count(),
            'tasksCompleted' => $myTasks->where('status', 'done')->count(),
            'totalTasks' => $myTasks->count(),
            'criticalIssues' => $myTasks->where('priority', 'high')->whereNotIn('status', ['done'])->count(),
        ];

        $upcomingDeadlines = 0;
        if ($collaboratorIds->isNotEmpty()) {
            $upcomingDeadlines = Task::whereIn('collaborator_id', $collaboratorIds)
                ->whereNotNull('due_date')
                ->whereNotIn('status', ['done'])
                ->count();
        }

        return view('dashboard', [
            'stats' => $stats,
            'activeProjects' => $activeProjects,
            'myTasks' => $myTasks,
            'upcomingDeadlines' => $upcomingDeadlines,
        ]);
    }
}
