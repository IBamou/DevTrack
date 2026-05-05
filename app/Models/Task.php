<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'due_date',
        'created_by',
        'collaborator_id',
        'project_id',
    ];

    public function project(): BelongsTo{
        return $this->belongsTo(Project::class);
    }

    public function collaborator(): BelongsTo{
        return $this->belongsTo(Collaborator::class);
    }

    public function creator(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }
}
