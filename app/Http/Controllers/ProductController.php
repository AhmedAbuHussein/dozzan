<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product as AppProduct;
use App\Setting as AppSetting;
use Facades\App\Repository\Product;
use Facades\App\Repository\Setting;
use Facades\App\Repository\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all('created_at');
        $setting = Setting::all();
        $categories = Category::all('sort');
        return view('products', compact('products', 'setting', 'categories'));
    }

    public function addToCart(Request $request)
    {
        $user = Auth::guard('web')->user();
        $this->validate($request, ['id'=> 'required|exists:products,id']);
        $product = AppProduct::find($request->id);
        \Cart::add([
            'id' => $user->id.random_int(1,9999), 
            'name' => $product->name_lang,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'shipping'=> optional(AppSetting::where('key', 'shipping')->first())->value ?? 20,
                'image'=> $product->image,
                'product_id'=>$product->id,
            ],
        ]);
        return response()->json("", 200);
    }

    public function CreateOrder(Request $request)
    {
        $this->validate($request, ['shipping'=> 'required|numeric', 'total'=> 'required|numeric']);
        $user = Auth::guard('web')->user();
        $contents = \Cart::getContent();
        $items = $contents->pluck('attributes.product_id');
        $user->orders()->create([
            'price'=>$request->total,
            'shipping'=> $request->shipping,
            'items'=> $items
        ]);
        \Cart::clear();
        return redirect()->back()->with(['message'=> 'Your Order Created Successfully', 'icon'=>'success']);
    }


    public function removeFromCart($item)
    {
        \Cart::remove($item);
        return redirect()->back()->with(['message'=> "Item Removed From Cart", 'icon'=> 'success']);
    }
}
