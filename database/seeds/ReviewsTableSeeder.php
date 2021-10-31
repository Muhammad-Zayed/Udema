<?php

use App\Course;
use App\User;
use App\Review;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{


    public function run()
    {
        $users = User::all();
        $courses = Course::all();

        factory(Review::class, 30)->make()->each(function($review) use ($users ,$courses ) {
            $review->user_id = $users->random()->id;
            $review->course_id = $courses->random()->id;
            $review->save();
        });
    }
}
