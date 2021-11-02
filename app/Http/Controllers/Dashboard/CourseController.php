<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Lesson;

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
        $lessons = Lesson::where('course_id' , $course->id)->paginate(10);
        return view('Dashboard.Courses.show',[
            'course'=>$course,
            'lessons'=>$lessons
        ]);
    }

    public function edit(Course $course)
    {
        $categories = Category::all();
        return view('Dashboard.Courses.edit',[
            'course'=>$course,
            'categories' =>$categories
        ]);
    }

    public function update(CourseRequest $request, Course $course)
    {
        $validatedData = $request->except(['image', '_token']);
        if ($request->hasFile('image')) {
            $validatedData['image'] = uploader($request, 'image');
        }

        $course->update($validatedData);
        return redirect(route('dashboard.courses.index'))
            ->with('success', 'Course Updated Succesfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect(route('dashboard.courses.index'))
            ->with('success', 'Course Deleted Succesfully');
    }


    public function changeCategory($category){
        //Select Category Button
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
