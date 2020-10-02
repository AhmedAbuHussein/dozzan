<?php

namespace App\Http\Controllers;

use App\Party;
use Facades\App\Repository\Setting;
use Facades\App\Repository\Product;
use Facades\App\Repository\Category;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $setting = Setting::all();
        $categories = Category::all('sort');
        $products = Product::all('created_at');
        $team = Team::get()->random(3);
        $parties = Party::orderBy('id', 'desc')->limit(4)->get();
        return view('home', compact('setting', 'categories', 'team', 'parties', 'products'));
    }
}
