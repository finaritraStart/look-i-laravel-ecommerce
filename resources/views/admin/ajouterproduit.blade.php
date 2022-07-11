@extends('layouts.appadmin')
@section('title')
    Ajouter produit
@endsection
@section('content')
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ajouter produit</h4>

                    @if (Session::has('status'))
                        <div class="alert alert-success">
                            {{ Session::get('status') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="cmxform" id="commentForm" method="post" action="/saveproduct" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <fieldset>
                            <div class="form-group">
                                <label for="cname">Nom du produit</label>
                                <input id="cname" class="form-control" name="product_name" minlength="2" type="text"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="product_price">prix du produit</label>
                                <input id="product_price" class="form-control" type="number" name="product_price" required>
                            </div>
                            <div class="form-group">
                                <label for="curl">catégorie du produit </label>

                                <select class="form-control" name="product_category" id="">
                                    <option value="">select category</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->category_name }}">{{ $categorie->category_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="product_image">image du produit</label>
                                <input id="product_image" class="form-control" type="file" name="product_image"
                                    enctype="multipart/form-data">
                            </div>

                            <input class="btn btn-primary" type="submit" value="Ajouter">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script src="admin/js/form-validation.js"></script>
    <script src="admin/js/bt-maxLength.js"></script> --}}
@endsection
