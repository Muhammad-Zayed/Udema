<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'image', 'short_description', 'price', 'category_id', 'long_description'];

    protected $appends = ['total_duration'];

    public function ScopeIsEnrolled($query)
    {
        $query->where(['course_id' => $this->id, 'user_id' => auth()->user()->id]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function setTotalDurationAttribute()
    {
        $this->lessons->sum('duration');
    }

    public function getTotalReviewPercentage($rate)
    {
        $count_reviews_of_rate = $this->reviews()->where('rate', $rate)->count();
        $total_reviews = $this->reviews->count();

        if ($total_reviews != 0)
            $percentage = ($count_reviews_of_rate / $total_reviews) * 100;
        else
            $percentage = 0;

        return $percentage;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'course_id');
    }

    public function isEnrolled()
    {
        $user_id = auth()->user()->id;
        $conditions = ['course_id' => $this->id, 'user_id' => $user_id];
        $course_enrolled = CourseEnroll::where($conditions)->first();


        $ValidOrNot = [
            'accepted' => false, // User Enrolled And Has been Accepted
            'exists' => false    // User Enrolled And Still Pending
        ];
        if ($course_enrolled) {
            if ($course_enrolled->is_cofirmed) $ValidOrNot['accepted'] = true; //For View
            else $ValidOrNot['exists'] = true;  //For Controller
        }
        return $ValidOrNot;
    }
}
