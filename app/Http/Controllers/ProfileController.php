<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Facades\App\Repository\Product;
use Facades\App\Repository\Category;
use Facades\App\Repository\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


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

    public function update(Request $request)
    {
        $user = Auth::guard('web')->user();
        $this->validate($request, [
            'name'=> 'required|min:5|max:30',
            'email'=> ['required','email',Rule::unique('users', 'email')->ignore($user->id)],
            'phone'=> ['required', Rule::unique('users', 'phone')->ignore($user->id)],
            'oldpassword'=> ['required'],
            'password' => 'nullable|min:8|confirmed'
        ]);

        if(Hash::check($request->oldpassword, $user->password)){
            $data = $request->except('oldpassword', 'password', '_token');
            if($request->has('password')){
                $data['password'] = Hash::make($request->password);
            }
            $user->update($data);
        }
        return redirect()->back()->with(['message'=> "Information Updated Successfully", 'icon'=>'success']);
    }

   
}
