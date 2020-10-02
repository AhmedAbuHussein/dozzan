<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Facades\App\Repository\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all('sort');
        return view('admin.categories', compact('categories'));
    }
}
