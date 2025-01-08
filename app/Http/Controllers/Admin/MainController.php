<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalUsers = User::count();

        return view('admin.home', [
            'title' => 'Admin Page',
            'totalProducts' => $totalProducts,
            'totalUsers' => $totalUsers,
        ]);
    }
}
