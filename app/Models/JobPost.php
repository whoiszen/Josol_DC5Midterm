<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = ['title', 'description','company'];

    public function applications()
    {
        return $this->hasMany(JobTrack::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
