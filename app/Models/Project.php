<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = ['title', 'description', 'created_by', 'due_date'];

    public function setTitleAttribute($value): void
    {
        $this->attributes['title'] = ucfirst($value);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function collaborators()
    {
        return $this->belongsToMany(User::class, 'collaborators')
            ->using(Collaborator::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function getProgressAttribute(): int
    {
        $total = $this->tasks()->count();
        if ($total === 0) {
            return 0;
        }
        $completed = $this->tasks()->where('status', 'done')->count();

        return (int) round(($completed / $total) * 100);
    }

    public function getStatusAttribute(): string
    {
        if (! $this->due_date) {
            return 'healthy';
        }

        $now = Carbon::now();
        $due = Carbon::parse($this->due_date);

        if ($due->isPast()) {
            return 'delayed';
        }

        if ($now->diffInDays($due) <= 3) {
            return 'at_risk';
        }

        return 'healthy';
    }
}
