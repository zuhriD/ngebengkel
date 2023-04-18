<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index()
    {
        return view('homelayout.home', [
            'vehicles' => Vehicle::all()
        ]);
    }

    public function postHandler(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/home')->with("info", "You don't have access");
        }
        if ($request->submit == "store") {
            $res = $this->store($request);
            return redirect('/home')->with($res['status'], $res['message']);
        }
        if ($request->submit == "update") {
            $res = $this->update($request);
            return redirect('/home')->with($res['status'], $res['message']);
        }
        if ($request->submit == "destroy") {
            $res = $this->destroy($request);
            return redirect('/home')->with($res['status'], $res['message']);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'vehicle_type' => 'required',
            'transmission' => 'required',
            'license_plate' => 'required'
        ]);

        Vehicle::create($validatedData);
        return ['status' => 'success', 'message' => 'Vehicle created successfully.'];
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'vehicle_type' => 'required',
            'transmission' => 'required',
            'license_plate' => 'required'
        ]);

        $vehicle = Vehicle::find($request->id);
        $vehicle->update($validatedData);
        return ['status' => 'success', 'message' => 'Vehicle updated successfully.'];
    }

    public function destroy(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
        ]);

        $vehicle = Vehicle::find($request->id);
        $vehicle->delete();
        return ['status' => 'success', 'message' => 'Vehicle deleted successfully.'];
    }

}
