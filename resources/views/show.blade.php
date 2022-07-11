@extends('layout.app')
@section('content')
    <h1>détail du produit</h1>
    <hr>
    <h2>{{ $produit->product_name }}</h2>
    <h3>${{ $produit->product_price }}</h3>
    <p>{{ $produit->description }}</p>
    <hr>
    <h4>{{ $produit->created_at }}</h4>
    <hr>
    <a href="/edit/{{ $produit->id }}" class="btn btn-default">edit</a>
    <a href="" class="btn btn-danger">delete</a>
    @include('footer')
@endsection
