<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\User as AppUser;
use Facades\App\Repository\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
       $users = User::all('created_at', 'DESC');
        return view('admin.user.index', compact('users'));
    }

    public function edit(AppUser $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, AppUser $user)
    {
        $this->validate($request, [
            'password'=> 'required|string|confirmed|min:8',
        ]);

        $user->update(['password'=> Hash::make($request->password)]);
        return redirect()->back()->with(['message'=> 'User Password Updated Successfully', 'icon'=> 'success']);
    }
}
