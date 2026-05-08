<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::bind('task', function ($value) {
    return Task::findOrFail($value);
});

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('/projects')->group(function () {

        Route::controller(ProjectController::class)->group(function(){
            Route::get('/', 'index')->name('projects.index');
            Route::get('/archives', 'archives')->name('projects.archives');
            Route::get('/create', 'create')->name('projects.create');
            Route::post('/', 'store')->name('projects.store');
            Route::get('/{project}', 'show')->name('projects.show');
            Route::get('/{project}/edit', 'edit')->name('projects.edit');
            Route::put('/{project}', 'update')->name('projects.update');
            Route::delete('/{project}', 'archive')->name('projects.archive');
            // Route::patch('/{project}/restore', 'restore')->name('projects.restore');
            Route::patch('/{project}/restore', 'restore')->withTrashed()->name('projects.restore');
            // Route::delete('/{project}/force', 'forceDelete')->name('projects.forceDelete');
                Route::delete('/{project}/force', 'forceDelete')->withTrashed()->name('projects.forceDelete');
            Route::post('/{project}/collaborator/add', 'addCollaborator')->name('projects.collaborator.add');
            Route::delete('/{project}/collaborator/{user}/remove', 'removeCollaborator')->name('projects.collaborator.remove');
        });


Route::controller(TaskController::class)->group(function () {
            Route::get('/tasks/archives', 'viewArchived')->name('tasks.archives');
            Route::get('/{project}/task/create', 'create')->name('projects.tasks.create');
            Route::post('/{project}/task', 'store')->name('projects.tasks.store');
            Route::get('/{project}/task/{task}/edit', 'edit')->name('projects.tasks.edit');
            Route::put('/{project}/task/{task}', 'update')->name('projects.tasks.update');
            Route::delete('/{project}/task/{task}', 'archive')->name('projects.tasks.archive');
            Route::patch('/{project}/task/{task}/restore', 'restore')->name('projects.tasks.restore');
            Route::delete('/{project}/task/{task}/force', 'forceDelete')->name('projects.tasks.forceDelete');
        });
    });
});

require __DIR__.'/auth.php';
