@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            @foreach ($listings as $listing)
            <div class="col-sm-4">
                @if (count($listing->photo) > 0)
                <h4>
                    <a href="{!! $listing->area !!}"> 
                        <img src="/{{ $listing->photo->first()->thumbnail_path }}" alt=""/><br />
                        {!! $listing-> area !!}
                    </a>
                </h4>
                @else
                    <img src="{{asset('img/home.png')}}" alt="" width="200px"/>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>   
@endsection
