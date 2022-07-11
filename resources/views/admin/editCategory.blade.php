@extends('layouts.appadmin')
@section('title')
    edit catégorie
@endsection
@section('content')
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">edit catégorie</h4>

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

                    <form class="cmxform" id="commentForm" method="POST" action="/editcategory/{{ $categories->id }}">
                        @csrf
                        @method('PUT')

                        <fieldset>
                            <input type="hidden" value="{{ $categories->id }}" />
                            <div class="form-group">
                                <label for="cname">Name (required, at least 2 characters)</label>
                                <input id="cname" class="form-control" value="{{ $categories->category_name }}"
                                    name="category_name" minlength="2" type="text" required>
                            </div>

                            <input class="btn btn-primary" type="submit" value="modifier">
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
