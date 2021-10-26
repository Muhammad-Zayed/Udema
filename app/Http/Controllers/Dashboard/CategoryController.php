<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('Dashboard.Categories.index')
            ->with('categories', $categories);
    }


    public function create()
    {
        return view('Dashboard.Categories.add');
    }


    public function store(CategoryRequest $request)
    {
        $validatedData = $request->except(['image', '_token']);

        if ($request->hasFile('image')) {
            $validatedData['image'] = uploader($request, 'image');
        }

        Category::create($validatedData);
        return redirect(route('dashboard.categories.index'))
            ->with('success', 'Category Added Succesfully');
    }

    public function show(Category $category)
    {
        return view('Dashboard.Categories.show')
            ->with('category', $category);
    }


    public function edit(Category $category)
    {
        return view('Dashboard.Categories.edit')
            ->with('category', $category);
    }


    public function update(Request $request, Category $category)
    {
        $validatedData = $request->except(['image']);

        if ($request->hasFile('image')) {
            $validatedData['image'] = uploader($request, 'image');
        }

        $category->update($validatedData);

        return redirect(route('dashboard.categories.index'))
            ->with('success', 'Category Updated Succesfully');


    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('dashboard.categories.index'))
            ->with('success', 'Category Deleted Succesfully');
    }
}
