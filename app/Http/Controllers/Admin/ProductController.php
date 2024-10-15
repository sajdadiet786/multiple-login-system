<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::paginate(10); // Server-side pagination
        return view('admin.products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('admin.products.create');
    }

    // Store a newly created product
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'The product name is required.',
            'price.required' => 'The product price is required.',
            'image.required' => 'Please upload a product image.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a jpeg, png, jpg, or gif.',
            'image.max' => 'The image size must not exceed 2MB.',
        ]);
        
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Store the image in 'public/products' and get the file path
            $imagePath = $request->file('image')->store('products', 'public');
        }
        
    
        // Create a new product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }
    

    // Show the form for editing a product
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Update an existing product
    public function update(Request $request, Product $product)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $image = $request->file('image');

        // Update image if provided
        if ($image) {
            // Delete the old image
            if (Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            // Store the new image
            $path = $image->store('public/products');
            $product->image = $path;
        }

        // Update product
        $product->update([
            'name' => $name,
            'price' => $price,
            'description' => $description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    // Delete a product
    public function destroy(Product $product)
    {
        // Delete the product's image
        if (Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        // Delete product record
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
