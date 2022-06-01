@extends('layouts.front')

@section('title', $product->name)

@section('content')
<div id="shado" class="py-3 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('category')}}">
                Collections
            </a> / 
            <a href="{{url('category/'.$product->category->slug)}}">
                {{$product->category->name}}
            </a>  / 
            <a href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}">
                {{ $product->name}}
            </a> 
        </h6>
    </div>
</div>

<div class="container py-4">
    <div class="card shadow product_data">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/products/'.$product->image)}}" class="w-100" alt="Product Image">
                </div>
                <div class="col-md-8">
                    <h2 id="label1" class="mb-0">
                        {{ $product->name}}
                        @if($product->trending == '1')
                            <label class="float-end badge bg-danger">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label id="lbO" class="me-3">Original Price: <s>R {{ $product->original_price}}</s></label>
                    <label class="fw-bold">Selling Price: R {{ $product->selling_price}}</label>
                    <p id="lbO" class="mt-3">
                        {!! $product->small_description !!}
                    </p>
                    <hr>
                    @if($product->qty > 0)
                        <label class="badge bg-success">In Stock</label>
                    @else
                        <label class="badge bg-danger">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div id="label2" class="col-md-3">
                            <input type="hidden" value="{{ $product->id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text btn-decrement">-</button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input">
                                <button class="input-group-text btn-increment">+</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br/>
                            @if($product->qty > 0)
                                <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                            @endif
                            <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <h3>Description</h3>
                <p id="lbO" class="mt-3">
                    {!! $product->description !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

