<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product; // Assuming you have a Product model
use App\Models\CMS; // Assuming you have a CMS model
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        
        $userCount = User::count();
        $productCount = Product::count();
        $cmsCount = CMS::count();

        return view('admin.dashboard', compact('userCount', 'productCount', 'cmsCount'));
    }
}
