@extends('layouts.appadmin')
@section('title')
    Catégories
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Catégorie</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>nom de la catégorie</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category_name }}</td>

                                        {{-- <td>
                            <label class="badge badge-info">On hold</label>
                            </td> --}}
                                        <td>
                                            <button class="btn btn-outline-primary"
                                                onclick="window.location ='{{ url('/editcategory/' . $category->id) }}'">Edit</button>


                                            <a class="btn btn-outline-danger"
                                                href="{{ url('/deletecategory/' . $category->id) }}"
                                                id="delete">delete</a>

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
