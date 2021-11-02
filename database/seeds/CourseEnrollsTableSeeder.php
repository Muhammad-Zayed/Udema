<?php

use App\Course;
use App\CourseEnroll;
use App\User;
use Illuminate\Database\Seeder;

class CourseEnrollsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $courses = Course::all();

        factory(CourseEnroll::class, 100)->make()->each(function($course_enroll) use ($users ,$courses ) {
            $course_enroll->user_id = $users->random()->id;
            $course_enroll->course_id = $courses->random()->id;
            $course_enroll->save();
        });
    }
}
