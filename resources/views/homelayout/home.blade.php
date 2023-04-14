@extends('homelayout.layout')

@section('title')
    Home Page
@endsection

@section('content')
<div class="row mt-3">
    <div class="col-md-8">
        <div class="container blok">
            <div class="row">
                <div class="col-md-8 mt-3">
                    <h3>Hi, John!</h3>
                    <p>Welcome to Ngebengkel, an online workshop reservation service! We are ready to help you to reserve your vehicle maintenance easily and quickly.</p>
                    <a href="#" class="text-decoration-none">Currently there are 3 queues of customers</a>
                </div>
                <div class="col-md-4 d-flex">
                    <img src="{{ asset('images/illustration_hero.png') }}" alt="home" class="img-fluid" width="251px" height="142px">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalRepair">
                    <div class="card">
                        <div class="row">
                             <div class="col-md-6">
                                 <img src="{{ asset('images/illustration_repair.png') }}" alt="home" class="img-fluid" width="172px" height="130px">
                             </div>
                             <div class="col-md-6">
                                 <h5 class="mt-4">
                                     Booking 
                                 </h5>
                                 <h5>for <b style="color: #6D378F">Repairs</b></h5>
                                 
                             </div>
                        </div>
                     </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalWash">
                    <div class="card">
                        <div class="row">
                             <div class="col-md-6">
                                 <img src="{{ asset('images/illustration_wash.png') }}" alt="home" class="img-fluid" width="172px" height="130px">
                             </div>
                             <div class="col-md-6">
                                 <h5 class="mt-4">
                                     Booking 
                                 </h5>
                                 <h5>for <b style="color: #6D378F">Wash</b></h5>
                                 
                             </div>
                        </div>
                     </div>
                </a>
            </div>
        </div>
        <h5 class="mt-4">History</h5>
        <div class="row mt-4">
            <div class="col-md-12">
                @if ($history->count() > 0)
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Car</th>
                        <th scope="col">Service</th>
                        <th scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($history as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->service_type }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->date)->format('M d, Y') }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                @else
                <p class="text-center col-md-12" style="color: gray">You don't have any history yet</p>
                @endif
               
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-7">
                            <h5 class="mb-1">
                                My Vehicles
                            </h5>
                            <p>{{ $count }} Vehicles</p>
                        </div>
                        <div class="col-sm-5 mt-3">
                            <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalVehicle">
                                <i class="fas fa-plus"></i>
                                <span class="ms-2">Add Vehicle</span>
                            </a>
                        </div>
                    </div>
                  </div>
                <div class="card-body">
                    <table>
                        @foreach ($vehicle as $car)
                        <tr>
                            <td class="pe-lg-5">{{  $car->name  }}</td>
                            <td class="ps-lg-5 pe-2">
                                <a href="{{ route('vehicle.edit', $car->id) }}" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalEditVehicle" data-id="{{ $car->id }}" data-name="{{ $car->name }}" data-type="{{ $car->vehicle_type }}" data-transmission="{{ $car->transmission }}" data-license-plate="{{ $car->license_plate }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('vehicle.destroy', ['vehicle' => $car->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link text-decoration-none" style="color: black !important" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                           </tr>
                        @endforeach
                      
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        })
    </script>
@endif
{{-- Modal Add Vehicle --}}
<div class="modal fade" id="modalVehicle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Vehicle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('vehicle.store') }}" method="POST">
                @csrf
                <label for="name"><b>Name</b></label>
                <input type="text" name="name" id="name" class="form-control mt-2">
                <label for="name" class="mt-2"><b>Vehicle Type</b></label>
                <select name="vehicle_type" id="vehicle_type" class="form-select mt-2">
                    <option value="1">Car</option>
                    <option value="2">Motorcycle</option>
                </select>
                <label for="name" class="mt-2"><b>Transmission</b></label>
                <select name="transmission" id="transmission" class="form-select mt-2">
                    <option value="1">Manual</option>
                    <option value="2">Automatic</option>
                </select>
                <label for="name" class="mt-2"><b>License Number Plate</b></label>
                <input type="text" name="license_number_plate" id="license_number_plate" class="form-control mt-2">

        </div>
        <div class="modal-footer">
         
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

{{-- Modal Edit Vehicle --}}
<div class="modal fade" id="modalEditVehicle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Vehicle</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('vehicle.update', $car->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="name"><b>Name</b></label>
                <input type="text" name="vehicleName" id="vehicleName" class="form-control mt-2">
                <label for="name" class="mt-2"><b>Vehicle Type</b></label>
                <select name="vehicleType" id="vehicleType" class="form-select mt-2">
                    <option value="1">Car</option>
                    <option value="2">Motorcycle</option>
                </select>
                <label for="name" class="mt-2"><b>Transmission</b></label>
                <select name="vehicleTransmission" id="vehicleTransmission" class="form-select mt-2">
                    <option value="1">Manual</option>
                    <option value="2">Automatic</option>
                </select>
                <label for="name" class="mt-2"><b>License Number Plate</b></label>
                <input type="text" name="vehicleLicensePlate" id="vehicleLicensePlate" class="form-control mt-2">

        </div>
        <div class="modal-footer">
         
          <button type="submit" class="btn btn-primary">Edit</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

{{-- Modal Booking for Repair --}}
<div class="modal fade" id="modalRepair" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Booking for Repair</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('booking.store', ['service_type' => 'repair']) }}" method="POST">
            @csrf
            <label for="name"><b>Select Your Vehicle</b></label>
            <select name="vehicle" id="selectVehicle" class="form-select mt-2" onchange="changeElement(this)">
                <option value="" selected disabled>Select Vehicle</option>
                @foreach ($vehicle as $data)
                    <option value="{{ $data->id }}" data-vehicle="{{ $data->vehicle_type }}" 
                        data-transmission="{{ $data->transmission }}">{{ $data->name }}</option>
                @endforeach
            </select>
            <label for="name" class="mt-2"><b>Date</b></label>
            <input type="date" name="date" id="date" class="form-control mt-2">
            <label for="name" class="mt-2"><b>Notes</b></label>
            <input type="text" name="notes" id="notes" class="form-control mt-2" placeholder="Notes">
            <label for="name" class="mt-2"><b>Select Package</b></label>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center mt-3" id="pricingTable">
                <p class="text-center col-md-12" style="color: gray">Please Select Vehicle First</p>
              </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Book</button>   
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

{{-- Modal Booking for Wash --}}
<div class="modal fade" id="modalWash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Booking for Wash</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('booking.store', ['service_type' => 'wash']) }}" method="POST">
                @csrf
                <label for="name"><b>Select Your Vehicle</b></label>
                <select name="vehicle" id="selectVehicleWash" class="form-select mt-2" onchange="changeElementWash(this)">
                    <option value="" selected disabled>Select Vehicle</option>
                    @foreach ($vehicle as $data)
                        <option value="{{ $data->id }}" data-vehicle="{{ $data->vehicle_type }}">{{ $data->name }}</option>
                    @endforeach
                </select>
                <label for="name" class="mt-2"><b>Date</b></label>
                <input type="date" name="date" id="date" class="form-control mt-2">
                <label for="name" class="mt-2"><b>Notes</b></label>
                <input type="text" name="notes" id="notes" class="form-control mt-2" placeholder="Notes">
                <label for="name" class="mt-2"><b>Select Package</b></label>
                <div class="row row-cols-1 row-cols-md-3 mb-3 text-center mt-3" id="pricingTableWash">
                    <p class="text-center col-md-12" style="color: gray">Please Select Vehicle First</p>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Book</button>   
            </form>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>


@endsection
