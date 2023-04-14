<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $vehicle  = Vehicle::all();
        $count = Vehicle::count();
        $history = Booking::with('vehicle')->get();
        return view('homelayout.home', compact('vehicle', 'count', 'history'));
    }
}
