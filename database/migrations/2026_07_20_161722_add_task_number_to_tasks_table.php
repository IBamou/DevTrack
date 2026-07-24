<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedInteger('task_number')->nullable()->after('project_id');
        });

        $projects = DB::table('projects')->get();
        foreach ($projects as $project) {
            $tasks = DB::table('tasks')
                ->where('project_id', $project->id)
                ->orderBy('created_at')
                ->get();
            foreach ($tasks as $index => $task) {
                DB::table('tasks')
                    ->where('id', $task->id)
                    ->update(['task_number' => $index + 1]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('task_number');
        });
    }
};
