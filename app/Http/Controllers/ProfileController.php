<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Facades\App\Repository\Product;
use Facades\App\Repository\Category;
use Facades\App\Repository\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();
        $setting = Setting::all();
        $categories = Category::all('sort');
        $items = \Cart::getContent();
        $total = \Cart::getTotal();
        $orders = Order::where('user_id', $user->id)->orderBy('updated_at', 'DESC')->get();
        return view('profile', compact('user', 'items', 'total', 'orders', 'setting', 'categories'));
    }

   
}
