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

            </div>
            @else
            <p>The Cart Is Empty</p>
            @endif
        </div>
    </div>
@endsection