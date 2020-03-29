@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            {{ $product->title }}
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" >
                        </div>
                        <div class="card-footer">
                            <span>Price :</span> {{ $product->price }} $
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection