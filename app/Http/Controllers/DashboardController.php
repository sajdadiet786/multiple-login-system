<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard with products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch the authenticated user
        $user = auth()->user();

        // Check if the user has the 'super-admin' role
        if ($user->hasRole('Super Admin')) {
            
            // Fetch all products if the user is a super-admin
            $products = Product::all();
        } else {
            // Get the products assigned to the authenticated user
            $products = $user->products;
        }

        // Return the dashboard view with the products
        return view('dashboard', compact('products'));
    }
}
