<?php

namespace App\Http\Controllers\Website;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('Website.Categories.index')
            ->with('categories', $categories);
    }

    public function show(Category $category)
    {
        return view('Website.Categories.show')->with('category', $category);
    }
}
