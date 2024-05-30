<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin/products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all(); // Lấy danh sách các danh mục
        return view('admin.products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'category_id' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add validation rule for category_id
    ]);

    // Generate a random slug for the product
    $slug = Str::random(10);

    // Create a new Product instance
    $product = new Product();

    // Set the product properties from the request data
    $product->name = $validatedData['name'];
    $product->description = $validatedData['description'];
    $product->price = $validatedData['price'];
    $product->category_id = $validatedData['category_id'];
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/images/fashion/product/front'), $imageName);
        $product->image = $imageName;
    } // Store image in the 'images' directory

    // Assign the generated slug to the product
    $product->slug = $slug;

    // Save the product to the database
    $product->save();

    // Redirect to a success page or route
    return redirect()->route('products.index')->with('success', 'Product created successfully');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();

    return view('admin.products.edit', compact('product', 'categories'));
}


    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048',
    ]);

    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->category_id = $request->category_id;

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/images/fashion/product/front'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('admin/products')->with('success', 'Product deleted successfully.');
    }
}
