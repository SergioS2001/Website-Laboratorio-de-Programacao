@extends('layouts.front')

@section('title')
   My Order
@endsection

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>My Orders</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tracking Number</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $item)
                                        <tr>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->total_price }}</td>
                                            <td>{{ $item->status == '0' ? 'pending' : 'completed' }}</td>
                                            <td>
                                                <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">View</a>
                                                <a href="{{ url('generate-pdf/'.$item->fname) }}" class="btn btn-primary">PDF</a>
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
    </div>
@endsection