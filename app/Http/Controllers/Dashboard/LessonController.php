<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Lesson;

class LessonController extends Controller
{
    public function create(Course $course)
    {
        return view('Dashboard.Lessons.create' , [
            'course'=> $course
        
        ]);
    }


    public function store(LessonRequest $request , Course $course)
    {
        $validatedData = $request->validated();
        $validatedData['course_id'] = $course->id;
        Lesson::create($validatedData);
        return redirect()->route('dashboard.courses.show', $validatedData['course_id'])
            ->with('success', 'Lesson Add Successflly');
    }

    public function show(Lesson $lesson)
    {
        //
    }

    public function edit(Lesson $lesson)
    {
        return view('Dashboard.Lessons.edit',[
            'lesson'=>$lesson
        ]);
    }

    public function update(LessonRequest $request , Lesson $lesson)
    {

        $validatedData = $request->validated();
        $validatedData['course_id'] = $lesson->course->id;
        $lesson->update($validatedData);
        return redirect()->route('dashboard.courses.show', $validatedData['course_id'])
            ->with('success', 'Lesson Updated Successflly');
    }

    public function destroy(Lesson $lesson)
    {
        $id = $lesson->course->id;
        
        $lesson->delete();

        return redirect(route('dashboard.courses.show' ,$id ))
            ->with('success', 'Lesson Deleted Succesfully');
    }
}
