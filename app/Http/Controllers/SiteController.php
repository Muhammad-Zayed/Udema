<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;

class SiteController extends Controller
{
    public function index()
    {
        $categories = Category::has('courses')
        ->withCount('courses')->limit(6)->get();
        
        $courses = Course::has('lessons')
        ->with(['lessons', 'reviews' , 'category'])->limit(6)->get();
        
        return view('Website.main')
            ->with('courses', $courses)
            ->with('categories', $categories);
    }



    public function changeCategory(){
        //Select Category Botton
        //0 => all Categories
        if(request('cat_id') != 0){
            $categories = category::findOrFail(request('cat_id'));
            $courses = $categories->courses;
            return view('Website.Courses.chooseCategory')
            ->with('courses',$courses) ;
        }else{
                $courses = Course::all();
                return view('Website.Courses.chooseCategory')
                ->with('courses',$courses) ;
        }
    }

}


