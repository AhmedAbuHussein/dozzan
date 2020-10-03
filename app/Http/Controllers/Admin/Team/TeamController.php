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

    public function edit(Team $employee)
    {
        return view('admin.team.edit', compact('employee'));
    }

    public function update(Request $request,Team $employee)
    {
        return $request->all();
    }



    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        return $request->all();
    }

    public function destroy(Team $employee)
    {
        $employee->delete();
        return redirect()->back()->with(['message'=> "Employee deleted Successfully", 'icon'=>'success']);
    }
}
