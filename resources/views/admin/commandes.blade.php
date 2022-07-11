@extends('layouts.appadmin')
@section('title')
    commandes
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">commandes</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>nom du client</th>
                                    <th>Adresse du client</th>
                                    <th>panier</th>
                                    <th>payment id</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$increment}}</td>
                                    <td>{{$order->nom}}</td>
                                    <td>{{$order->adresse}}</td>

                                    <td>

                                       @foreach ($order->panier->items as $item)
                                       {{$item['product_name'].' , '}}
                                       @endforeach

                                       
                                    </td>
                                    <td>{{$order->payment_id}}</td>

                                    <td>
                                        <button class="btn btn-outline-primary">view</button>

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
