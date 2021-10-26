<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Category;
use App\Post;

class SiteController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $categories = Category::all();
        return view('Website.main')
            ->with('courses', $courses)
            ->with('categories', $categories);
    }
}
