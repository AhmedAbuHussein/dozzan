<?php
namespace App\Http\Controllers\Admin\Reservation;


use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservation = Reservation::orderBy('created_at', 'DESC')->get();
        return view('admin.reservation.index', compact('reservation'));
    }

    public function show(Reservation $reservation)
    {
        return view('admin.reservation.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $status = ['Waiting', 'Approved', 'Finished', 'Decline'];
        return view('admin.reservation.edit', compact('reservation', 'status'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $this->validate($request, [
            'status'=> 'required|in:Waiting,Approved,Finished,Decline',
        ]);
        $reservation->update([
            'status'=> $request->status,
        ]);
        return redirect()->route('admin.reservation.index')->with(['message'=> 'Resrevation Status Updated Successfully', 'icon'=>'success']);
    }

}
