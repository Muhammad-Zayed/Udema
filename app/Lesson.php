<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
