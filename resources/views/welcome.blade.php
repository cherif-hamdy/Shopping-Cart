@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-header text-center">
                            {{ $product->title }}
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" >
                        </div>
                        <div class="card-footer text-center">
                            <span>Price :</span>$ {{ $product->price }} 
                            <div class="my-2 ">
                                <a class="btn btn-primary">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection