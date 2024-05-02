<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colobrator extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
