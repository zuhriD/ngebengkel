@extends('homelayout.layout')

@section('title')
    Invoice
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Invoice</h3>
                    </div>
                    <div class="card-body">
                        @if ($orderlist->isEmpty())
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading text-center">No Data</h4>
                                <p class="text-center">There is no data</p>
                            </div>
                        @else
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
                                            @else
                                                <p>{{ $order->note }}</p>
                                            @endif
                                        </td>
                                        <td>{{ $order->ammount }}</td>
                                        <td>
                                            @if ($order->status == "stand_by")
                                                <span class="badge bg-warning text-dark">Stand By</span>
                                            @elseif ($order->status == "on_process")
                                                <span class="badge bg-info text-white">On Process</span>
                                            @elseif ($order->status == "done")
                                                <span class="badge bg-success text-white">Done</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('booking.invoice', $order->id) }}" target="_blank" class="btn btn-success text-white"><i class="fas fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
