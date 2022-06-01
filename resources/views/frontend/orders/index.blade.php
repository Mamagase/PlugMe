@extends('layouts.front')

@section('title')
    My Orders
@endsection

@section('content')
<div id="shado" class="py-3 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a> /
            <a href="{{('my-orders')}}">
                Orders
            </a>
        </h6>
    </div>
</div>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Orders</h4>
                </div>
                <div class="card-body">
                    <table id="tableO" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                                    <td>{{$order->tracking_no}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td>
                                        @if($order->status == '0')
                                            <label class="badge bg-warning">Pending...</label>
                                        @else
                                            <label class="badge bg-success">Completed</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a id="btn-view" href="{{url('view-order/'.$order->id)}}" class="btn btn-primary">View</a>
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