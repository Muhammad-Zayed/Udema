<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'name',
        'duration',
        'url',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
