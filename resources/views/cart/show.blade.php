@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if ($cart)
            <div class="col-md-8">
               @foreach ($cart->items as $product)
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="card-title">
                                <h3>{{ $product['title']}}</h3>
                            </div>
                            <div class="card-body">
                                $ {{$product['price']}}
                                <a href="#" class="btn btn-danger  ml-4">Remove</a>
                                <input disabled type="text" name="qty" id="qty" value="{{ $product['qty'] }}">
                                <a href="#" class="btn btn-secondary ">Change</a>
                            </div>
                        </div>
                    </div>
               @endforeach
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">
                            Your Cart
                        </h3>
                        <div class="card-text">
                            <h6> Total Price Is <strong>${{ $cart->totalPrice}}</strong></h6>
                            <h6> Total Quantities <strong>{{ $cart->totalQty }}</strong></h6>
                            <a class="btn btn-secondary text-white">Done</a>
                            <a href="{{ route('cart.delete') }}" class="btn btn-danger text-white">Remove Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <p>The Cart Is Empty</p>
            @endif
        </div>
    </div>
@endsection