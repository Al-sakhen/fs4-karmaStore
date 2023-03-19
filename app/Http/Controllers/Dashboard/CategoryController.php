<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('childrens')->get();
        return view('dashboard.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::whereNull('parent_id')->get();
        return view('dashboard.categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->except(['_token']);
        Category::create($data);
        return redirect()->route('dashboard.categories.index')->with('success' , 'Category created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::whereNull('parent_id')->get();
        return view('dashboard.categories.edit' , compact('parents' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {

        $data = $request->except(['_token']);
        $category =  Category::findOrFail($id);
        $category->update($data);

        return redirect()->route('dashboard.categories.index')->with('success' , 'Category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Category::destroy($id);
        $category =  Category::findOrFail($id);
        if($category->childrens->count() > 0){
            return redirect()->back()->with('error' , "Cant't delete category that have childs");
        }

        $category->delete();
        return redirect()->back()->with('success' , 'Category deleted');
    }
}
