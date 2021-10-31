<?php

use App\Course;
use App\Lesson;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        factory(Lesson::class, 30)->make()->each(function($lesson) use ($courses) {
            $lesson->course_id = $courses->random()->id;
            $lesson->save();
        });
    }
}
