@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
@section('content')

<div class="container emp-profile">
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="/{{ $user->photo }}" alt=""/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {!! $user->name !!}
                    </h5>
                    <h6>
                        Superman Photography
                    </h6>
                    <p class="proile-rating">EVENTS : <span>10</span></p>
                </div>
            </div>
            <div class="col-md-2">
                <a href="/edit-profile"> Edit Profile <a/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>Social Media</p>
                    <a href="">Facebook</a><br/>
                    <a href="">Instagram</a><br/>
                    <a href="">Twitter</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{!! $user->name !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{!! $user->email !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>{!! $user->phone !!}</p>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>

@endsection