<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Sparepart;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $service_type)
    {
        $vehicle = Vehicle::find($request->get('vehicle'));
        $booking = new Booking([
            'id_vehicle' => $request->get('vehicle'),
            'id_user' => Auth::user()->id,
            'service_type' => $service_type,
            'name' => $vehicle->name,
            'date' => $request->get('date'),
            'notes' => $request->get('notes'),
            'ammount' => $request->get('package'),
            'status' => 'pending'
        ]);
        $booking->save();
        return redirect('/')->with('success', 'Booking saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request, $id)
        {
            //
            $request->validate([
                'statusEdit' => 'required'
            ]);
            $booking = Booking::find($id);
            if($request->get('statusEdit') == '1'){
                $booking->status = 'stand_by';
            }else if($request->get('statusEdit') == '2'){
                $booking->status = 'on_process';
            }else if($request->get('statusEdit') == '3'){
                $booking->status = 'done';
            }
            $booking->save();
            return redirect('/home/orderlist')->with('success', 'Booking updated!');
        }

    public function updateSparepart(Request $request, $sparepart)
    {
        $request->validate([
            'sparepart_id' => 'required',
            'booking_id' => 'required',
        ]);
        $sparepart = Sparepart::find($sparepart);
        $booking = Booking::find($request->get('booking_id'));
        $total_price = intval($booking->ammount) + intval($sparepart->price);
        $booking->ammount = $total_price;
        $booking->spareparts_id = $request->get('sparepart_id');
        $booking->save();
        return redirect('/home/orderlist')->with('success', 'Booking updated!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
        $booking->delete();
        return redirect('/home/orderlist')->with('success', 'Booking deleted!');
    }
}
