<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function index(Request $request, $lang)
    {
        $request->session()->put('locale', $lang);
        
        return redirect()->back();
    }
}
