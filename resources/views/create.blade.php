@extends('layout.app')

@section('content')
    @if (Session::has('message'))
        <p class="alert alert-success">
            {{ Session::get('message') }}
            {{ Session::put('message'), null }}
        </p>
    @endif
    <form action="{{ url('/saveproduct') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Product</label>
            <input type="text" name="product_name" placeholder="Product Name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" name="product_price" placeholder="Product Price" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Product description</label>
            <textarea class="form-control" name="product_description" cols="30" rows="10" required></textarea>
        </div>
        <input type="submit" value="Add Product" class="btn btn-primary">
    </form>
    @include('footer')
@endsection
