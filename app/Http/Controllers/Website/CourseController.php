<?php

namespace App\Http\Controllers\Website;

use App\Category;
use App\Course;
use App\CourseEnroll;
use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderby('id', 'desc')->get();
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
        if ($course->isEnrolled()['exists'])
            return redirect(route('courses.show', $course->id))->with('error', 'You Already Requested The Enrollment !');
        else {
            CourseEnroll::create([
                'course_id' => $course->id,
                'user_id' => auth()->user()->id,
                'is_cofirmed' => 0
            ]);
        }
        return redirect(route('courses.show', $course->id))->with('error', 'Your Request Has Been Send !');

    }
}
