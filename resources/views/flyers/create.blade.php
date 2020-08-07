@extends('layouts.app')

@section('content')

    <h2 class="page-header">Create a New Gallery</h2>

    <div class="card">
        <div class="card-body">
            <form role="form" method="POST" action="/flyers" enctype="multipart/form-data">
                @csrf
 
                <div class="col-sm-8 mx-auto">
                    <label>Gallery</label>
                    <div class="form-group">
                        
                        <input class="form-control" type="text" name="area" required placeholder="Event Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="time" required placeholder="Time">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="venue" required placeholder="Venue">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="date" required placeholder="Date">
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
