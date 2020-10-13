<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|string|min:3',
            'phone'=> "required|string|between:6,15",
            'persons'=> 'required|numeric|min:1',
            'date'=> 'required|date',
            'time'=> 'required|string',
            'type'=> 'required|in:table,room'
        ]);
        $user = Auth::guard('web')->user();
        $data = $request->except('_token');
        $data['user_id'] = $user->id;
        Reservation::create($data);
        return redirect()->back()->with(['message'=> 'Done And Waiting Admin Approval ...', 'icon'=>'success']);
    }
}
