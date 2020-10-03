<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category as AppCategory;
use App\Http\Controllers\Controller;
use Facades\App\Repository\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all('sort');
        return view('admin.category.index', compact('categories'));
    }

    public function show(AppCategory $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(AppCategory $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, AppCategory $category)
    {
        $this->validate($request, [
            'icon'=> "required|regex:/<i class='flaticon-([0-9])+'><\/i>/",
            'name'=> 'required|string|max:20|min:3',
            'details'=> 'required|max:255|min:10',
            'sort'=> 'required|numeric'
        ]);

        cache()->forget('CATEGORY.ALL.SORT');
        cache()->forget('PRODUCT.ALL.CREATED_AT');
        $category->update($request->all());
        return redirect()->back()->with(['message'=> 'category Update Successfully', 'icon'=>'success']);
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'icon'=> "required|regex:/<i class='flaticon-([0-9])+'><\/i>/",
            'name'=> 'required|string|max:20|min:3',
            'details'=> 'required|max:255|min:10',
            'sort'=> 'required|numeric'
        ]);

        cache()->forget('CATEGORY.ALL.SORT');
        cache()->forget('PRODUCT.ALL.CREATED_AT');
        AppCategory::firstOrCreate($request->except('_token'));
        return redirect()->route('admin.categories.index')->with(['message'=> 'category Created Successfully', 'icon'=>'success']);
    }


    public function destroy(AppCategory $category)
    {
        $category->delete();
        cache()->forget('CATEGORY.ALL.SORT');
        cache()->forget('PRODUCT.ALL.CREATED_AT');
        return redirect()->route('admin.categories.index')->with(['message'=> 'category Deleted Successfully', 'icon'=>'success']);
    }

}
