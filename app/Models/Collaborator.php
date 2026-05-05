<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
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
}
