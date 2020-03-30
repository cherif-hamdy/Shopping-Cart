@extends('layouts.app')

@section('content')

    <div class="container">

        {{-- Flashing Success Message --}}
        {{-- @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif --}}

        <div class="row">     
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-header text-center">
                            {{ $product->title }}
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $product->image) }}" height="200" width="200"  class="card-img-top" >
                        </div>
                        <div class="card-footer text-center">
                            <span>Price :</span>$ {{ $product->price }} 
                            <div class="my-2 ">
                                <a href="{{ route('cart.add' , $product->id) }}" class="btn btn-primary">Add To Cart</a>
                            </div>
                            @auth
                                @if (auth()->user()->email === 'admin@admin.com')
                                    <div class="d-flex d-inline-flex">
                                        <a href="{{ route('products.edit' , $product->id) }}" class="btn btn-info mr-2">Edit</a>
                                        <form action="{{ route('products.destroy' , $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection