<?php

namespace App\Http\Controllers\Admin\Product;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product as AppProduct;
use Facades\App\Repository\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all('created_at');
        return view('admin.product.index', compact('products'));
    }

    public function show(AppProduct $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(AppProduct $product)
    {
        $categories = Category::orderBy('sort')->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, AppProduct $product)
    {
        $this->validate($request, [
            'name'=> 'required|array',
            'name.*'=> 'required|string|min:3',
            'details'=> 'required|array',
            'details.*'=> 'required|string|min:3',
            'image'=>'nullable|image',
            'category_id'=>'required|numeric|exists:categories,id',
        ]);
       

        $data = $request->except('_token');
        $name = $product->image;
        if($request->has('image')){
            $path = public_path($name);
            if(is_file($path)){
                unlink($path);
            }
            $name = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/images', $name);
            $name = 'images/'.$name;
        }
        $data['image']= $name;
        $product->update($data);
        cache()->forget('CATEGORY.ALL.SORT');
        cache()->forget('PRODUCT.ALL.CREATED_AT');
        return redirect()->back()->with(['message'=> 'Product Update Successfully', 'icon'=>'success']);

    }


    public function create()
    {
        $categories = Category::orderBy('sort')->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|array',
            'name.*'=> 'required|string|min:3',
            'details'=> 'required|array',
            'details.*'=> 'required|string|min:3',
            'image'=>'required|image',
            'category_id'=>'required|numeric|exists:categories,id',
        ]);
       
        $data = $request->except('_token');
        $name = '';
        if($request->has('image')){
            $name = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/images', $name);
            $name = 'images/'.$name;
        }
        $data['image']= $name;
        AppProduct::create($data);
        cache()->forget('CATEGORY.ALL.SORT');
        cache()->forget('PRODUCT.ALL.CREATED_AT');
        return redirect()->route('admin.products.index')->with(['message'=> 'Product Created Successfully', 'icon'=>'success']);

    }

    public function destroy(AppProduct $product)
    {
        $image = public_path($product->image);
        if(is_file($image)){
            unlink($image);
        }
        $product->delete();
        cache()->forget('CATEGORY.ALL.SORT');
        cache()->forget('PRODUCT.ALL.CREATED_AT');
        return redirect()->route('admin.products.index')->with(['message'=> 'Product Deleted Successfully', 'icon'=>'success']);
    }


}
