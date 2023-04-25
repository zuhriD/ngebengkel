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
        return view('homelayout.home', compact('vehicle', 'count', 'history', 'countCarRepair', 'countCarWash', 'countMotorcycleRepair', 'countMotorcycleWash'));
    }

    public function orderlist()
    {
        $orderlist = Booking::with('vehicle')->get();
        $spareparts = Sparepart::all();
        return view('homelayout.orderlist', compact('orderlist', 'spareparts'));
    }

    public function sparepart()
    {
        $sparepart = Sparepart::all();
        return view('homelayout.sparepart', compact('sparepart'));
    }
}
