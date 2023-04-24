@extends('homelayout.layout')

@section('title')
    Sparepart
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3>Sparepart</h3>
                        <a href="" class="btn btn-primary text-white"  data-bs-toggle="modal" data-bs-target="#modalAdd">Add Sparepart</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sparepart as $spare)
                                    <tr>
                                        <td>{{ $spare->name }}</td>
                                        <td>{{ $spare->price }}</td>
                                        <td>{{ $spare->stock }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary text-white"  data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('sparepart.destroy', $spare->id) }}" method="post" class="d-inline">
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
@endsection
