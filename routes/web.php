<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('/projects')->group(function () {

        Route::controller(ProjectController::class)->group(function(){
            Route::get('/', 'index')->name('project.index');
            Route::get('/archives', 'archives')->name('projects.archives');
            Route::get('/create', 'create')->name('project.create');
            Route::post('/store', 'store')->name('project.store');
            Route::get('/{project}', 'show')->name('project.show');
            Route::post('/{project}/edit', 'edit')->name('project.edit');
            Route::put('/{project}/update', 'update')->name('project.update');
            Route::delete('/{project}/archive', 'archive')->name('projects.archive');
            Route::patch('/{project}/restore', 'restore')->name('projects.restore');
            Route::delete('/{project}/forceDelete', 'forceDelete')->name('projects.forceDelete');
        });
    

        Route::controller(TaskController::class)->group(function () {
            Route::get('/{project}/task/create', 'create')->name('projects.tasks.create');
            Route::post('/{project}/task/store', 'store')->name('projects.tasks.store');
            Route::get('/{project}/task/{task}/edit', 'edit')->name('projects.tasks.edit');
            Route::patch('/{project}/task/{task}/update', 'update')->name('projects.tasks.update');
            Route::patch('/{project}/task/{task}/archive', 'archive')->name('projects.tasks.archive');
            Route::patch('/{project}/task/{task}/restore', 'restore')->name('projects.tasks.restore');
            Route::delete('/{project}/task/{task}/forceDelete', 'forceDelete')->name('projects.tasks.forceDelete');
        });
    });
});

require __DIR__.'/auth.php';
