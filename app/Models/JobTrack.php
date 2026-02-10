<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobTrack extends Model
{
    protected $fillable = [
        'job_id',
        'user_id',
        'status',
        'cover_letter',
    ];

    public function job()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

