<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\User;

class MainController extends Controller
{
    public function index()
    {
        $users = User::count();
        $categories = Category::count();
        $courses = Course::count();
        $lessons = Lesson::count();
        return view('Dashboard.main',
        [
            'users'=>$users,
            'categories' =>$categories,
            'lessons' => $lessons,
            'courses' =>$courses
        ]);
    }
}
