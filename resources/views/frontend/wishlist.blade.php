@extends('layouts.front')

@section('title')
    My Wishlist
@endsection

@section('content')
<div id="shado" class="py-3 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a> / 
            <a href="{{url('wishlist')}}">
                wishlist
            </a> 

        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow ">
       <div id="cart" class="card-body">
           @if($wishlists->count() > 0)
                @foreach($wishlists as $wish)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{asset('assets/uploads/products/'.$wish->products->image)}}" class="cartI" alt="Image here">
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{$wish->products->name}}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>R {{$wish->products->selling_price}}</h6>
                        </div>
                        <div id="labelC" class="col-md-2 my-auto">
                            <input type="hidden" class="prod_id" value="{{$wish->prod_id}}">
                            @if($wish->products->qty >= $wish->prod_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text btn-decrement">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text btn-increment">+</button>
                                </div>         
                            @else
                                <h6>Out of Stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2  my-auto">
                            <button class="btn btn-success addToCartBtn"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger remove-wishlist"><i class="fa fa-trash"></i> Remove</button>
                        </div>
                    </div>
                @endforeach
           @else
           <div id="cart-empty" class="card-body text-center">
                <h2>Your <i class="fa fa-heart"></i> Wishlist is empty</h2>
                <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
            </div> 
           @endif
       </div>
    </div>
</div>
@endsection