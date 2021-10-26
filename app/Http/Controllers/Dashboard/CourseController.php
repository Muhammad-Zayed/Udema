<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function create(Category $category)
    {
        return view('Dashboard.Courses.add')
            ->with('category', $category);
    }


    public function store(CourseRequest $request, Category $category)
    {

        $validatedData = $request->except(['image', '_token']);
        if ($request->hasFile('image')) {
            $validatedData['image'] = uploader($request, 'image');
        }
        $validatedData['category_id'] = $category->id;
        Course::create($validatedData);
        return redirect()->route('dashboard.categories.show', $category->id)
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
}
