@extends('layouts.app')


@section('content')
<div class="row">
    @foreach ($listings as $listing)
        <a href="{!! $listing->area !!}">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-4">
                        @if (count($listing->photo) > 0)
                        <img src="/{{ $listing->photo->first()->thumbnail_path }}" alt=""/>
                        <h4 class="card-details">
                            <a  href="{!! $listing->area !!}"> 
                                <br />
                                {!! $listing-> area !!}
                            </a> 
                        </h4>
                        @php
                            $userId = $listing->user_id;
                            $user = App\Models\User::select('name')->where('id', $userId)->first();
                        @endphp
                        <div>
                            <p style="width:210px">
                                <img class="p-pic" src="/{{ $listing->photo->first()->thumbnail_path }}" alt=""/> {!! $user->name !!} 
                            </p>

                            <p class="flyer-summery">
                                 {!! $listing->time !!} 
                            </p>

                            <p class="flyer-summery">
                                 {!! $listing->venue !!} 
                            </p>

                            <p class="flyer-summery">
                                 {!! $listing->date !!} 
                            </p>
                            <span>  </span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>  
        </a>
    @endforeach 
</div>
@endsection
