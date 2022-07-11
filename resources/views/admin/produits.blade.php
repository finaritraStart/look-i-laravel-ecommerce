@extends('layouts.appadmin')
@section('title')
    Produits
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">produit</h4>
            @if (Session::has('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Image</th>
                                    <th>nom du produit</th>
                                    <th>Catégorie du produit</th>
                                    <th>prix</th>
                                    <th>status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                :@foreach ($produits as $produit)
                                    <tr>
                                        <td>{{ $produit->id }}</td>
                                        <td><img src="/storage/product_images/{{ $produit->product_image }}"
                                                alt="">
                                        </td>
                                        <td>{{ $produit->product_name }}</td>
                                        <td>{{ $produit->product_category }}</td>
                                        <td>{{ $produit->product_price }}</td>



                                        <td>
                                            @if ($produit->status == 1)
                                                <label class="badge badge-success">Activé</label>
                                            @else
                                                <label class="badge badge-danger">Desactivé</label>
                                            @endif


                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary"
                                                onclick="window.location ='{{ url('/edit_product/' . $produit->id) }}'">Edit</button>
                                            <a class="btn btn-outline-danger"
                                                href="{{ url('/delete_product/' . $produit->id) }}"
                                                id="delete">delete</a>

                                            @if ($produit->status == 1)
                                                <button class="btn btn-outline-warning"
                                                    onclick="window.location ='{{ url('/desactiver_product/' . $produit->id) }}'">Désactiver</button>
                                            @else
                                                <button class="btn btn-outline-success"
                                                    onclick="window.location ='{{ url('/activer_product/' . $produit->id) }}'">Activer</button>
                                            @endif

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script src="admin/js/data-table.js"></script>
    @endsection
