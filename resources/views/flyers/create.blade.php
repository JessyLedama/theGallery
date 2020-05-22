@extends('layouts.app')

@section('content')

    <h2 class="page-header">Create a New Gallery</h2>

    <div class="card">
        <div class="card-body">
            <form role="form" method="POST" action="/flyers" enctype="multipart/form-data">
                @csrf

                <div class="col-sm-8 mx-auto">
                    <div class="form-group">
                        <label>Gallery</label>
                        <input class="form-control" type="text" name="area" required placeholder="Gallery">
                    </div>

                    <button type="submit" class="btn btn-default">Save</button>
                    <button type="reset" class="btn btn-default">Clear All</button>
                </div>

                <div class="row">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>

@endsection
