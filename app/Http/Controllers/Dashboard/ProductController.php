<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get(); //eager loading
        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNotNull('parent_id')->where('status', 1)->get();
        if ($categories->count() == 0) {
            return redirect()->route('dashboard.categories.create')->with('error', 'No categories found, please create category to continue !');
        }
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->except(['image']);

        $path = $request->file('image')->store('products');
        $data['image'] = $path;
        Product::create($data);

        return redirect()->route('dashboard.products.index')->with('success', 'Product created succesffully');
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
        $product = Product::findOrFail($id);
        $categories = Category::whereNotNull('parent_id')->where('status', 1)->get();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $data = $request->except(['image']);
        $product = Product::findOrFail($id);
        $old_image = $product->image;

        // if there is a new image uploaded
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products');
        }
        // null collescing
        $data['image'] = $path ?? $old_image;
        $product->update($data);

        if ($old_image && $request->hasFile('image')) {
            Storage::delete($old_image);
        }

        return redirect()->route('dashboard.products.index')->with('success' , 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Storage::delete($product->image);
        return redirect()->back()->with('success', 'Product deleted');
    }
}
