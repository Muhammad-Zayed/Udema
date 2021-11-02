<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->back()
        ->with('success', 'Lesson Deleted Succesfully');
    }
}
