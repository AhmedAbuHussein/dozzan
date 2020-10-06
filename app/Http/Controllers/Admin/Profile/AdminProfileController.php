<?php
namespace App\Http\Controllers\Admin\Profile;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller {
    
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $this->validate($request, [
            'name'=> 'required|min:5|max:30',
            'email'=> ['required','email',Rule::unique('users', 'email')->ignore($user->id)],
            'oldpassword'=> ['required'],
            'password' => 'nullable|min:8|confirmed'
        ]);

        if(Hash::check($request->oldpassword, $user->password)){
            $data = $request->except('oldpassword', 'password', '_token');
            if($request->has('password')){
                $data['password'] = Hash::make($request->password);
            }
            $user->update($data);
            return redirect()->back()->with(['message'=> "Information Updated Successfully", 'icon'=>'success']);
        }
        return redirect()->back()->with(['message'=> "Invalid Current Password", 'icon'=>'error']);
        
    }
}