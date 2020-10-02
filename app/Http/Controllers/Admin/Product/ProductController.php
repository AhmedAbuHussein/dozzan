<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Facades\App\Repository\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all('created_at');
        return view('admin.products', compact('products'));
    }
}
