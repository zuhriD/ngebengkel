@extends('homelayout.layout')

@section('title')
    Order List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Order List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Owner</th>
                                    <th scope="col">Vehicle Type</th>
                                    <th scope="col">Vehicle Name</th>
                                    <th scope="col">Transmission</th>
                                    <th scope="col">Request</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderlist as $order)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($order->date)->format('M d, Y') }}</td>
                                        <td>{{ $order->user->fullname }}</td>
                                        <td>{{ $order->vehicle->vehicle_type }}</td>
                                        <td>{{ $order->vehicle->name }}</td>
                                        <td>{{ $order->vehicle->transmission }}</td>
                                        <td>
                                            @if ($order->note == null)
                                                <p>No Request</p>
                                            @endif
                                        </td>
                                        <td>{{ $order->ammount }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a href="" class="btn btn-success text-white"  data-bs-toggle="modal" data-bs-target="#modalSparepart">Spareparts</a>
                                            <a href="" class="btn btn-primary text-white"  data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('booking.destroy', $order->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Spareparts --}}
    <div class="modal fade" id="modalSparepart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Spareparts</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Modal Edit Booking --}}
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
@endsection