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
        height: 100%;
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
        <div class="col-md-4">
            <div class="profile-img">
                @if ($user->photo == NULL)
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="" />
                @else
                <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}">
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5>
                    {{ucfirst($user->name)}}
                </h5>
                <h6>
                    {{ucfirst($profile->job?? '')}}
                </h6>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Information</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>Social Link</p>
                <a href="{{$profile->google_plus_link?? ''}}">Google Plus</a><br>
                <a href="{{$profile->aim_link?? ''}}">AIM</a><br>
                <a href="{{$profile->window_live_link?? ''}}">Window LIve</a> <br>
                <a href="{{$profile->yahoo_link?? ''}}">Yahoo</a><br>
                <a href="{{$profile->icq_link?? ''}}">ICQ</a><br>
                <a href="{{$profile->skype_link?? ''}}">Skype</a><br>
                <a href="{{$profile->google_talk_link?? ''}}">Google Talk</a><br>
                <a href="{{$profile->facebook_link?? ''}}">Facebook</a><br>
                <a href="{{$profile->twitter_link?? ''}}">Twitter</a><br>
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
                            <p>{{ucfirst($user->name)}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ucfirst($user->email)}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->number}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Date Of Birth</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->dob}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Profession</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ucfirst($profile->job?? '')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Joined In:</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->created_at}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Last Updated:</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->updated_at}}</p>
                        </div>
                    </div>
                    @if(Auth::user()->id == $user->id)
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('profile.edit', ['profile' => $user->id])}}" class="btn btn-info">Edit Profile</a>

                        </div>
                    </div>
                    @else

                    @endif
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Location</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ucfirst($profile->place?? '')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Personal ID</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->personal_id?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Issued Date</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->issued_date?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Issued By</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->issued_by?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Supervisor name</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->supervisor_name?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Supervisor Date Of Birth</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$profile->supervisor_dob?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Your Bio</label><br />
                            <p>{{$profile->detail?? ''}}</p>
                        </div>
                    </div>
                    <div class="row">
                        @if(Auth::user()->id == $user->id)
                            @if($profile->user_id?? '' == Auth::user()->id)
                            <div class="col-md-12">
                                <a href="{{ route('information.edit', ['information' => $user->id])}}" class="btn btn-info">Edit Information</a>
                            </div>
                            @else
                            <div class="col-md-12">
                                <a href="{{ route('information.create', ['information' => $user->id])}}" class="btn btn-info">Add Information</a>
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