@extends('layout.app')

@section('content')
    <form action="/edit/{{ $product->id }}" method="POST" class="form-horizontal">


        {{ csrf_field() }}
        @method('PUT')
        <div class="form-group">
            <input type="hidden" value="{{ $product->id }}" />
            <label>Product</label>
            <input type="text" value="{{ $product->product_name }}" name="product_name" placeholder="Product Name"
                class="form-control" required>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" value="{{ $product->product_price }}" name="product_price" placeholder="Product Price"
                class="form-control" required>
        </div>
        <div class="form-group">
            <label>Product description</label>
            <textarea class="form-control" value="{{ $product->product_description }}" name="product_description" cols="30"
                rows="10" required></textarea>
        </div>
        <input type="submit" value="Add Product" class="btn btn-primary">
    </form>
    @include('footer')
@endsection
