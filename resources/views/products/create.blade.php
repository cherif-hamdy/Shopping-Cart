@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        Add Product
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Product's Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Product's Title" value="{{ old('title') }}">
                                <div>{{ $errors->first('title') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="price">Product's Price</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Product's Price" value="{{ old('price') }}">
                                <div>{{ $errors->first('price') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="image">Product's Image</label>
                                <div>
                                    <input type="file" name="image" id="image">
                                </div>
                                <div>{{ $errors->first('image') }}</div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 