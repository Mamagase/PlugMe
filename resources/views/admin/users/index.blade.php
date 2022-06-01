@extends('layouts.admin')

@section('title')
    Registered Users
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered Users</h4>
            <hr>
        </div>
        <div class="card-body"> 
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 0 @endphp
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $count += 1}}</td>
                            <td>{{ $user->name.' '.$user->lname}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->phone}}</td>
                            <td>
                                <a href="{{ url('view-user/'.$user->id) }}" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </dib>  
    </div>      
@endsection