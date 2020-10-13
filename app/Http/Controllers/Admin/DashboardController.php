<?php
namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Reservation;
use App\User;

class DashboardController extends Controller {
    
    public function index()
    {
        $users = User::count();
        $products = Product::count();
        $categories = Category::count();
        $orders = Order::count();
        $reservation = Reservation::count();
        return view('admin.index', compact('users', 'products', 'categories', 'orders', 'reservation'));
    }
}