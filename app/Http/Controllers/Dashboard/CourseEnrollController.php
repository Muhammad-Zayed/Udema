<?php

namespace App\Http\Controllers\Dashboard;

use App\CourseEnroll;
use App\Http\Controllers\Controller;

class CourseEnrollController extends Controller
{

    public function index()
    {
        $courses_enrolls = CourseEnroll::with(['user','course'])->paginate(15);
        return view('Dashboard.CoursesEnrolls.index',['enrolls'=>$courses_enrolls]);
    }

    public function update(CourseEnroll $courses_enroll)
    {
        $courses_enroll->is_confirmed = 1 - $courses_enroll->is_confirmed;
        $courses_enroll->save();
        return redirect(route('dashboard.courses_enrolls.index'))
        ->with('success', 'Status Updated Succesfully');

    }  

    public function destroy(CourseEnroll $courses_enroll)
    {

        $courses_enroll->delete();
        return redirect(route('dashboard.courses_enrolls.index'))
        ->with('success', 'Request Deleted Succesfully');
    }
}
