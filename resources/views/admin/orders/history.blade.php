@extends('layouts.admin')

@section('title')
    PlugMe | Orders
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="cardA">
                <div class="card-header">
                    <h4>Orders History
                        <a href="{{url('orders')}}" class="btn btn-warning btn-sm float-right">New Orders</a>
                    </h4>
                    <hr>
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
                                        <a id="btn-view" href="{{url('admin/view-order/'.$order->id)}}" class="btn btn-primary">View</a>
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