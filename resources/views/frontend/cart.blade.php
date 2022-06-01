@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
<div id="shado" class="py-3 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a> / 
            <a href="{{url('cart')}}">
                Cart
            </a> 

        </h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow ">
        @if($carts->count() > 0)
            <div id="cart" class="card-body">
                @php $totP = 0; @endphp
                @foreach($carts as $cart)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{asset('assets/uploads/products/'.$cart->products->image)}}" class="cartI" alt="Image here">
                        </div>
                        <div class="col-md-3 my-auto mt-4">
                            <h6>{{$cart->products->name}}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>R {{$cart->products->selling_price}}</h6>
                        </div>
                        <div id="labelC" class="col-md-3 my-auto">
                            <input type="hidden" class="prod_id" value="{{$cart->prod_id}}">
                            @if($cart->products->qty >= $cart->prod_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text changeQ btn-decrement">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$cart->prod_qty}}">
                                    <button class="input-group-text changeQ btn-increment">+</button>
                                </div>           
                                @php $totP += $cart->products->selling_price * $cart->prod_qty; @endphp
                            @else
                                <h6>Out of Stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2 mt-4 my-auto">
                            <button class="btn btn-danger delete-cartI"><i class="fa fa-trash"></i> Remove</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="checkout" class="card-footer">
                <h6>Total Price : R {{$totP}}
                    <a href="{{ url('checkout')}}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
                </h6>
            </div>
        @else
            <div id="cart-empty" class="card-body text-center">
                <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
                <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
            </div>
        @endif
    </div>
</div>
@endsection