@extends('layouts.appadmin')
@section('title')
    Ajouter produit
@endsection
@section('content')
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ajouter slider</h4>

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
                    <form class="cmxform" id="commentForm" method="post" action="/saveslider" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <fieldset>
                            <div class="form-group">
                                <label for="cname">description 1</label>
                                <input id="cname" class="form-control" name="description1" minlength="2" type="text"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="product_price">description 2</label>
                                <input id="product_price" class="form-control" type="text" name="description2" required>
                            </div>


                            <div class="form-group">
                                <label for="product_image">image</label>
                                <input id="slider_image" class="form-control" type="file" name="product_image" required>
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
