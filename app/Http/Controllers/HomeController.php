<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Sparepart;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $vehicle  = Vehicle::all();
        $count = Vehicle::count();
        $history = Booking::with('vehicle')->get();
        $countCarRepair = Booking::with('vehicle')
                          ->where('service_type', 'repair')
                          ->whereHas('vehicle', function($query) {
                              $query->where('vehicle_type', 'car');
                          })
                          ->count();
        $countCarWash = Booking::with('vehicle')
                          ->where('service_type', 'wash')
                          ->whereHas('vehicle', function($query) {
                              $query->where('vehicle_type', 'car');
                          })
                          ->count();
        $countMotorcycleRepair = Booking::with('vehicle')
                          ->where('service_type', 'repair')
                          ->whereHas('vehicle', function($query) {
                              $query->where('vehicle_type', 'motorcycle');
                          })
                          ->count();
        $countMotorcycleWash = Booking::with('vehicle') 
                          ->where('service_type', 'wash')
                          ->whereHas('vehicle', function($query) {
                              $query->where('vehicle_type', 'motorcycle');
                          })
                          ->count();
        return view('homepage_view.home', compact('vehicle', 'count', 'history', 'countCarRepair', 'countCarWash', 'countMotorcycleRepair', 'countMotorcycleWash'));
    }

    public function orderlist()
    {
        $orderlist = Booking::with('vehicle')
        ->orderBy('status', 'asc')
        ->orderByRaw("FIELD(status, 'stand_by', 'on_process', 'done')")
        ->get();
        $spareparts = Sparepart::all();
        return view('homepage_view.orderlist', compact('orderlist', 'spareparts'));
    }

    public function sparepart()
    {
        $sparepart = Sparepart::all();
        return view('homepage_view.sparepart', compact('sparepart'));
    }

    public function invoice()
    {
        $orderlist = Booking::with(['vehicle','user'])->where('status', 'done')->get();
        return view('homepage_view.invoice', compact('orderlist'));
    }

    public function invoiceUser($id)
    {
        $orderlist = Booking::with(['vehicle','user','spareparts'])->where('id_user', $id)->where('status', 'done')->get();
        dd($orderlist);
        return view('homepage_view.invoice', compact('orderlist'));
    }
}
