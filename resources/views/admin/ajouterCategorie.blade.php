@extends('layouts.appadmin')
@section('title')
    Ajouter catégorie
@endsection
@section('content')
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ajouter catégorie</h4>

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

                    <form class="cmxform" id="commentForm" method="get" action="/savecategory">

                        {{ csrf_field() }}

                        <fieldset>
                            <div class="form-group">
                                <label for="cname">Name (required, at least 2 characters)</label>
                                <input id="cname" class="form-control" name="category_name" minlength="2"
                                    type="text" required>
                            </div>
                            {{-- <div class="form-group">
                                        <label for="cemail">E-Mail (required)</label>
                                        <input id="cemail" class="form-control" type="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="curl">URL (optional)</label>
                                        <input id="curl" class="form-control" type="url" name="url">
                                    </div>
                                    <div class="form-group">
                                        <label for="ccomment">Your comment (required)</label>
                                        <textarea id="ccomment" class="form-control" name="comment" required></textarea>
                                    </div> --}}
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
