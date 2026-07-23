<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'due_date',
        'created_by',
        'collaborator_id',
        'project_id',
        'task_number',
    ];

    public function getTaskCodeAttribute(): string
    {
        return $this->project->prefix . '-' . $this->task_number;
    }

    public function project(): BelongsTo{
        return $this->belongsTo(Project::class);
    }

    public function assignedTo(): BelongsTo{
        return $this->belongsTo(Collaborator::class, 'collaborator_id');
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }

    public function creator(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }
}
