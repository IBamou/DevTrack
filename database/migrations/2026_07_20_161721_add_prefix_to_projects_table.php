<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('prefix', 10)->nullable()->unique()->after('title');
        });

        $projects = DB::table('projects')->whereNull('prefix')->get();
        foreach ($projects as $project) {
            $words = explode(' ', $project->title);
            $prefix = '';
            foreach ($words as $word) {
                $prefix .= strtoupper($word[0]);
                if (strlen($prefix) >= 2) break;
            }
            if (strlen($prefix) < 2) {
                $prefix = strtoupper(substr($project->title, 0, 2));
            }
            $basePrefix = $prefix;
            $counter = 1;
            while (DB::table('projects')->where('prefix', $prefix)->exists()) {
                $prefix = $basePrefix . $counter;
                $counter++;
            }
            DB::table('projects')->where('id', $project->id)->update(['prefix' => $prefix]);
        }
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('prefix');
        });
    }
};
