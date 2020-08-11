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

    img {
        width: 100%;
        height: auto;
    }
</style>
<div class="container emp-profile">

    <div class="row">
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <form action="{{ route('profile.confirm', ['locale'=>app()->getLocale(),'profile' => Auth::user()->id])}} " method="POST" enctype="multipart/form-data" id="editprofile">
                        @csrf

                        <div class="form-group">
                            @if ($user->photo == NULL)
                            <img src="{{asset('storage/user.png')}}" alt="" style="width: 300px; height: 300px;" />
                            @else
                            <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}" alt="Image" style="width: 300px; height: 300px;">
                            @endif
                            &ensp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&ensp;
                            <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview image" style="width: 300px ; height:300px;">
                            <div style="padding-top: 10px;">
                                <i class="fas fa-image"></i>&ensp;
                                <a href="#" class="btn btn-block btn-info">
                                    <label for="photo">{{__('Your Image')}}</label>
                                    <input type="file" class="form-control has-feedback{{ $errors->has('photo') ? ' has-error' : '' }}" name="photo" id="photo" value="{{ $user->photo}}" style="display: none;">
                                </a>
                            </div>
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                            <i class="fas fa-user"></i> &ensp;<label for="name">{{__('Your name')}}</label>
                            <input class="form-control" name="name" placeholder="Enter Your Name" value="{{ $user->name}}">
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <i class="fas fa-calendar"></i>&ensp;<label for="dob">{{__('Your Birthday')}}</label>
                            <input type="date" class="form-control" name="dob" placeholder="Enter Your DOB" value="{{ $user->dob }}">
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('number') ? ' has-error' : '' }}">
                            <i class="fas fa-phone"></i>&ensp;<label for="number">{{__('Your Phone Number')}}</label>
                            <input type="tel" class="form-control" name="number" placeholder="Enter Your Phone Number" value="{{ $user->number }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                            <button type="reset" class="btn btn-warning">{{__('Reset')}}</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger">{{__('Cancel')}}</a>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection