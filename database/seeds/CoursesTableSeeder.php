<?php

use App\Category;
use App\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        factory(Course::class, 100)->make()->each(function($course) use ($categories) {
            $course->category_id = $categories->random()->id;
            $course->save();
        });
    }
}
