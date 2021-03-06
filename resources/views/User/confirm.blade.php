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
                <img  src="{{asset('storage/user.png')}}" alt="" />
                @else
                <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}">
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5>
                    {{$user->name}}
                </h5>
            </div>
        </div>
    </div>
    <div class="row">
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
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <form action="{{ route('profile.update', ['locale'=>app()->getLocale(),'profile' =>  Auth::user()->id])}} " method="POST" enctype="multipart/form-data" id="editprofile">
                @csrf
                @method('PUT')
                <input type="hidden" name='name' value="{{$user->name}}">
                <input type="hidden" name='dob' value="{{$user->dob}}">
                <input type="hidden" name='number' value="{{$user->number}}">
                <input type="hidden" name='photo' value="{{$user->photo}}">
                <button type="submit" class="btn btn-default" id="editprofilebtn">{{__('Submit')}}</button>
                <button onclick="window.history.back()" class="btn btn-danger">{{__('Cancel')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection