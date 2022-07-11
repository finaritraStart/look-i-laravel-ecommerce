@extends('layouts.appadmin')
@section('title')
    sliders
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"sliders</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Image</th>
                                        <th>description 1</th>
                                        <th>description 2</th>

                                        <th>status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td><img src="/storage/slider_images/{{ $slider->slider_image }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $slider->description1 }}</td>
                                            <td>{{ $slider->description2 }}</td>





                                            <td>
                                                @if ($slider->status == 1)
                                                    <label class="badge badge-success">Activé</label>
                                                @else
                                                    <label class="badge badge-danger">Desactivé</label>
                                                @endif


                                            </td>
                                            <td>
                                                <button class="btn btn-outline-primary"
                                                    onclick="window.location ='{{ url('/edit_slider/' . $slider->id) }}'">Edit</button>
                                                <a class="btn btn-outline-danger"
                                                    href="{{ url('/delete_slider/' . $slider->id) }}"
                                                    id="delete">delete</a>

                                                @if ($slider->status == 1)
                                                    <button class="btn btn-outline-warning"
                                                        onclick="window.location ='{{ url('/desactiver_slider/' . $slider->id) }}'">Désactiver</button>
                                                @else
                                                    <button class="btn btn-outline-success"
                                                        onclick="window.location ='{{ url('/activer_slider/' . $slider->id) }}'">Activer</button>
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
