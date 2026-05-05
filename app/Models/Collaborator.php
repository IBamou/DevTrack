<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Collaborator extends Pivot
{
    protected $fillable = [
        'user_id',
        'project_id',
        'role',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }


    public function isMember()
    {
        return $this->role === 'member';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
