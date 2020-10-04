<?php

namespace App\Http\Controllers\Admin\Party;

use App\Category;
use App\Http\Controllers\Controller;
use App\Party;
use App\Product as AppProduct;
use Facades\App\Repository\Product;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    public function index()
    {
        $parties = Party::orderBy('created_at', 'DESC')->get();
        return view('admin.party.index', compact('parties'));
    }

    public function show(Party $party)
    {
        return view('admin.party.show', compact('party'));
    }

    public function edit(Party $party)
    {
        return view('admin.party.edit', compact('party'));
    }

    public function update(Request $request, Party $party)
    {
        $this->validate($request, [
            'owner'=> 'required|string|min:3|max:20',
            'event'=> 'required|string|min:10|max:150',
            'image'=>'nullable|image',
            'link'=>'nullable|url',
        ]);
       

        $data = $request->except('_token');
        $name = $party->image;
        if($request->has('image')){
            $path = public_path($name);
            if(is_file($path)){
                unlink($path);
            }
            $name = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/images', $name);
            $name = 'images/'.$name;
        }
        if($request->link == null){
            $data['link'] = $party->link;
        }
        $data['image']= $name;
        $party->update($data);
        return redirect()->route('admin.parties.index')->with(['message'=> 'Data Update Successfully', 'icon'=>'success']);

    }


    public function create()
    {
        return view('admin.party.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'owner'=> 'required|string|min:3|max:20',
            'event'=> 'required|string|min:10|max:150',
            'image'=>'required|image',
            'link'=>'nullable|url',
        ]);
       
        $data = $request->except('_token');
        
        if($request->has('image')){
            $name = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/images', $name);
            $data['image'] = 'images/'.$name;
        }
        if($request->link == null){
            $data['link'] = route('home');
        }
        Party::create($data);
        return redirect()->route('admin.parties.index')->with(['message'=> 'Party Created Successfully', 'icon'=>'success']);

    }

    public function destroy(Party $party)
    {
        $party->delete();
        return redirect()->route('admin.parties.index')->with(['message'=> 'Party Deleted Successfully', 'icon'=>'success']);
    }


}
