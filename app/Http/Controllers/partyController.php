<?php

namespace App\Http\Controllers;

use App\Party;
use Facades\App\Repository\Category;
use Facades\App\Repository\Setting;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    public function index()
    {
        $parties = Party::orderBy('created_at', 'DESC')->paginate(8);
        $setting = Setting::all();
        $categories = Category::all('sort');
        return view('parties', compact('parties', 'setting', 'categories'));
    }
}
