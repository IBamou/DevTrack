<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('welcome');

Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Projects
    Route::get('/projects', fn() => view('projects.index'))->name('projects.index');
    Route::get('/projects/create', fn() => view('projects.create'))->name('projects.create');
    Route::post('/projects', fn() => redirect('/projects'))->name('projects.store');
    Route::get('/projects/{id}', fn() => view('projects.show'))->name('projects.show');
    Route::get('/projects/{id}/edit', fn() => view('projects.edit'))->name('projects.edit');
    Route::patch('/projects/{id}', fn() => redirect('/projects'))->name('projects.update');
    Route::patch('/projects/{id}/archive', fn() => redirect('/projects'))->name('projects.archive');
    Route::patch('/projects/{id}/restore', fn() => redirect('/projects'))->name('projects.restore');
    Route::delete('/projects/{id}/forceDelete', fn() => redirect('/projects/archives'))->name('projects.forceDelete');
    Route::get('/projects/archives', fn() => view('projects.archives'))->name('projects.archives');

    // Tasks
    Route::get('/tasks/create', fn() => view('tasks.create'))->name('tasks.create');
    Route::post('/tasks', fn() => redirect('/projects'))->name('tasks.store');
    Route::get('/tasks/{id}/edit', fn() => view('tasks.edit'))->name('tasks.edit');
    Route::patch('/tasks/{id}', fn() => redirect('/projects'))->name('tasks.update');
    Route::delete('/tasks/{id}', fn() => redirect('/projects'))->name('tasks.destroy');
});

require __DIR__.'/auth.php';
