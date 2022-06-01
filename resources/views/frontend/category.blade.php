@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
<div id="shado" class="py-3 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('category')}}">
                Collections
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Categories</h2>
                <div class="row">
                    @foreach($category as $cate)
                        <div id="col" class="col-md-2 mb-3">
                            <a href="{{url('category/'.$cate->slug)}}">
                                <div class="card" >
                                    <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" class="card-img-top" alt="Category Image">
                                    <div id="cat" class="card-body">
                                        <h5>{{ $cate->name}}</h5>
                                        <p>
                                            {{ $cate->description}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection