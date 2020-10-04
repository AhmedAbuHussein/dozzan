<?php

namespace App\Http\Controllers\Admin\Team;

use App\Http\Controllers\Controller;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::get();
        return view('admin.team.index', compact('team'));
    }   

    public function show(Team $employee)
    {
        return view('admin.team.show', compact('employee'));
    }

    public function edit(Team $employee)
    {
        return view('admin.team.edit', compact('employee'));
    }

    public function update(Request $request,Team $employee)
    {
        $this->validate($request, [
            'name'=> 'required|string|min:3|max:20',
            'details'=> 'required|string|min:10|max:200',
            'facebook'=> 'required|url',
            'twitter'=> 'required|url',
            'linkedin'=> 'required|url',
            'image'=> 'nullable|image',
        ]);
        $data = $request->except('_token');
        $data['image'] = $employee->image;
        if($request->hasFile('image')){
            if(is_file(public_path($employee->image))){
                unlink(public_path($employee->image));
            }
            $name = time(). '.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/images', $name);
            $data['image'] = 'images/'.$name;
        }
        $employee->update($data);

        return redirect()->route('admin.team.index')->with(['message'=> "Employee Update Successfuly", 'icon'=> 'success']);
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|string|min:3|max:20',
            'details'=> 'required|string|min:10|max:200',
            'facebook'=> 'required|url',
            'twitter'=> 'required|url',
            'linkedin'=> 'required|url',
            'image'=> 'required|image',
        ]);
        
        $data = $request->except('_token', 'image');
        if($request->hasFile('image')){
            $name = time(). '.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/images', $name);
            $data['image'] = 'images/'.$name;
        }
        Team::create($data);

        return redirect()->route('admin.team.index')->with(['message'=> "Employee Created Successfuly", 'icon'=> 'success']);
    }

    public function destroy(Team $employee)
    {
        $employee->delete();
        return redirect()->back()->with(['message'=> "Employee deleted Successfully", 'icon'=>'success']);
    }
}
