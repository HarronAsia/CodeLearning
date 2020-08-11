@extends('layouts.app')

@section('content')
<style>
    body {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }

    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 70%;
        height: auto;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }
</style>
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-3">
            <div class="profile-img">
                @if ($user->photo == NULL)
                <img  src="{{asset('storage/user.png')}}" alt="" />
                @else
                <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}" class="img-thumbnail" style="width: 200px; height:200px" >
                @endif
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-head">
                <h5>
                    {{$user->name}}
                </h5>
                <h6>
                    {{$profile->job?? ''}}
                </h6>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{__('About')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{__('Information')}}</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>{{__('Social Link')}}</p>
                <a href="{{$profile->google_plus_link?? ''}}">{{__('Google Plus')}}</a><br>
                <a href="{{$profile->aim_link?? ''}}">{{__('AIM')}}</a><br>
                <a href="{{$profile->window_live_link?? ''}}">{{__('Window LIve')}}</a> <br>
                <a href="{{$profile->yahoo_link?? ''}}">{{__('Yahoo')}}</a><br>
                <a href="{{$profile->icq_link?? ''}}">{{__('ICQ')}}</a><br>
                <a href="{{$profile->skype_link?? ''}}">{{__('Skype')}}</a><br>
                <a href="{{$profile->google_talk_link?? ''}}">{{__('Google Talk')}}</a><br>
                <a href="{{$profile->facebook_link?? ''}}">{{__('Facebook')}}</a><br>
                <a href="{{$profile->twitter_link?? ''}}">{{__('Twitter')}}</a><br>
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Name')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Email')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->email}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Phone')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->number}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Date Of Birth')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->dob}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Profession')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->job?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Joined In:')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->created_at}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Last Updated:')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->updated_at}}</p>
                        </div>
                    </div>
                    @if(Auth::user()->id == $user->id)
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('profile.edit', ['locale'=>app()->getLocale(),'profile' => $user->id])}}" class="btn btn-info">{{__('Edit Profile')}}</a>

                        </div>
                    </div>
                    @else

                    @endif
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Location')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->place?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Personal ID')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->personal_id?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Issued Date')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->issued_date?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Issued By')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->issued_by?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Supervisor name')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->supervisor_name?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{__('Supervisor Date Of Birth')}}</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->supervisor_dob?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>{{__('Your Bio')}}</label><br />
                            <p>{{$profile->detail?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        @if(Auth::user()->id == $user->id)
                            @if($profile->user_id?? '' == Auth::user()->id)
                            <div class="col-md-12">
                                <a href="{{ route('information.edit', ['locale'=>app()->getLocale(),'information' => $user->id])}}" class="btn btn-info">{{__('Edit Information')}}</a>
                            </div>
                            @else
                            <div class="col-md-12">
                                <a href="{{ route('information.create', ['locale'=>app()->getLocale(),'information' => $user->id])}}" class="btn btn-info">{{__('Add Information')}}</a>
                            </div>
                            @endif
                        @else

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection