<?php

namespace App\Http\Controllers\Website;

use App\Category;
use App\Course;
use App\CourseEnroll;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::has('lessons')
        ->with(['category','reviews','lessons'])->paginate(12);
        
        $categories = Category::all();
        
        return view('Website.Courses.index')
            ->with(['courses' => $courses, 'categories' => $categories]);

    }

    public function show(Course $course)
    {
        return view('Website.Courses.show')->with('course', $course);
    }

    public function enroll(Course $course)
    {
        if($course->isEnrolled()['exists'])
            return redirect(route('courses.show', $course->id))->with('error', 'You Already Requested The Enrollment !');
        else {
            CourseEnroll::create([
                'is_confirmed' => false,
                'course_id' => $course->id,
                'user_id' => auth()->user()->id
            ]);
        }
        return redirect(route('courses.show', $course->id))->with('success', 'Your Request Has Been Send !');

    }
}
