@extends('layouts.app')


@section('content')
<div class="row">
    @foreach ($listings as $listing)
        <a href="{!! $listing->area !!}">
            <div class="card">
                <div class="card-body-h">
                    <div class="col-md-4">
                        @if (count($listing->photo) > 0)
                        <img class="cover" src="/{{ $listing->photo->first()->thumbnail_path }}" alt=""/>
                        <h4 class="card-details">
                            <a  href="{!! $listing->area !!}"> 
                                <br />
                                {!! $listing-> area !!}
                            </a> 
                        </h4>
                        @php
                            $userId = $listing->user_id;
                            $user = App\Models\User::select('name')->where('id', $userId)->first();
                            $lastname = App\Models\User::select('last-name')->where('id', $userId)->first();
                            $email = App\Models\User::select('email')->where('id', $userId)->first();
                            $phone = App\Models\User::select('phone')->where('id', $userId)->first();
                        @endphp
                        <div class="summery-container">
                            <a type="button" data-toggle="modal" data-target="#profileModal">
                                <img class="p-pic" src="/{{ $listing->photo->first()->thumbnail_path }}" alt=""/> {!! $user->name !!} 
                            </a>

                            <p class="flyer-summery fa fa-clock-o">
                                 {!! $listing->time !!} 
                            </p>

                            <p class="flyer-summery fa fa-map-marker">
                                 {!! $listing->venue !!} 
                            </p>

                            <p class="flyer-summery fa fa-calendar">
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

    <!-- Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="profileModalLabel">{!! $user->name !!}'s Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="fa fa-user"> {!! $user->name !!} </p> <br />
            <p class="fa fa-envelope"> {!! $email->email !!} </p> <br />
            <p class="fa fa-phone"> {!! $phone->phone !!} </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
