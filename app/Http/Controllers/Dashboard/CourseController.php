<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['category','lessons'])->get();
        $categories = Category::all();
        return view('Dashboard.Courses.index',
        [
            'courses'=>$courses,
            'categories'=>$categories
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('Dashboard.Courses.add',
        [
            'categories'=>$categories,
    
        ]);
    }


    public function store(CourseRequest $request)
    {

        $validatedData = $request->except(['image', '_token']);
        if ($request->hasFile('image')) {
            $validatedData['image'] = uploader($request, 'image');
        }

        Course::create($validatedData);
        return redirect()->route('dashboard.categories.show', $validatedData['category_id'])
            ->with('success', 'Course Add Successflly');
    }

    public function show(Course $course)
    {
        //
    }

    public function edit(Course $course)
    {
        //
    }

    public function update(Request $request, Course $course)
    {
        //
    }

    public function destroy(Course $course)
    {
        //
    }

    public function changeCategory($category){
        //Select Category Botton
        //0 => all Categories
        $id = (int)$category;
        if($id != 0){
            $category = category::findOrFail($id);

            $courses = Course::with(['category','lessons'])
            ->where('category_id' ,$id)->get();
            return view('Dashboard.Courses.chooseCategory')
            ->with('courses',$courses) ;
        }else{
                $courses = Course::all();
                return view('Dashboard.Courses.chooseCategory')
                ->with('courses',$courses) ;
        }
    }
}
