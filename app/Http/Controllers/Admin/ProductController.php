<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index()
{
    $user = Auth::user();

    // If the user is Super Admin, show all products
    if ($user->hasRole('Super Admin')) {
        $products = Product::paginate(5); // Server-side pagination
    } else {
        // Otherwise, show only the products assigned to this user
        $products = $user->products()->paginate(5);
    }

    return view('admin.products.index', compact('products'));
}


    // Show the form for creating a new product
    public function create()
    {
        $users = User::all(); // Fetch all users
    
        return view('admin.products.create', compact('users'));
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
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);
        $product->users()->attach($request->users);
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }
    

    // Show the form for editing a product
    public function edit(Product $product)
    {
        $users = User::all();   
        return view('admin.products.edit', compact('product','users'));
    }

    // Update an existing product
    public function update(Request $request, Product $product)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $image = $request->file('image');
        $users = $request->input('users'); 
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
        if ($users) {
            // Sync the selected users (removes any previously assigned users and attaches the new ones)
            $product->users()->sync($users);
        }
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
