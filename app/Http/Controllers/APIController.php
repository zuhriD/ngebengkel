<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Helpers\APIFormatter;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{

    public function Vehicle(Vehicle $vehicle)
    {
        if (Auth::check()) {
            return APIFormatter::createApi(200, 'success', $vehicle);
        } else {
            return APIFormatter::createApi(401, 'unauthorized', null);
        }
    }

}
