@extends('layouts.Information.app')

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

    textarea[resize='none'] {
        resize: none !important;
    }

    textarea[resize='both'] {
        resize: both !important;
    }

    textarea[resize='vertical'] {
        resize: vertical !important;
    }

    textarea[resize='horizontal'] {
        resize: horizontal !important;
    }
</style>
<div class="container emp-profile">

    <div class="row">
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <form action="{{ route('information.update',['locale'=>app()->getLocale(),'information'=>$profile->user_id??''])}} " method="POST" enctype="multipart/form-data" id="editprofile">
                        @csrf
                        @method('PUT')
                        <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <i class="fas fa-search-location"></i> &ensp;<label for="place">{{__('Your Place')}}</label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('place') ? ' has-error' : '' }}" name="place" placeholder="{{__('Enter Your Place')}}" value="{{$profile->place?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-briefcase"></i> &ensp;<label for="job">{{__('Your Job')}}</label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('job') ? ' has-error' : '' }}" name="job" placeholder="{{__('Enter Your Job')}}" value="{{$profile->job?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-id-card"></i>&ensp;<label for="personal_id">{{__('Your Personal ID')}}</label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('personal_id') ? ' has-error' : '' }}" name="personal_id" placeholder="{{__('Enter Your Personal ID')}}" value="{{$profile->personal_id?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-calendar"></i>&ensp;<label for="issued_date">{{__('Your Issued Date')}}</label>
                            <input type="date" class="form-control has-feedback{{ $errors->has('issued_date') ? ' has-error' : '' }}" name="issued_date" placeholder="{{__('Enter Your Issued Date')}}" value="{{$profile->issued_date?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-search-location"></i>&ensp;<label for="issued_by">{{__('Your Issued By')}}</label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('issued_by') ? ' has-error' : '' }}" name="issued_by" placeholder="{{__('Enter Your Issued By')}}" value="{{$profile->issued_by?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-user-lock"></i>&ensp;<label for="supervisor_name">{{__('Your Supervisor(Optional if you are under 14)')}}</label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('supervisor_name') ? ' has-error' : '' }}" name="supervisor_name" placeholder="{{__('Enter Your Supervisor Name')}}" value="{{$profile->supervisor_name?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-calendar"></i>&ensp;<label for="supervisor_dob">{{__('Your Supervisor Date Of Birth(Optional if you are under 14)')}}</label>
                            <input type="date" class="form-control has-feedback{{ $errors->has('supervisor_dob') ? ' has-error' : '' }}" name="supervisor_dob" placeholder="{{__('Enter Your Supervisor Dob')}}" value="{{$profile->supervisor_dob?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fab fa-google-plus-g"></i>&ensp;<label for="google_plus_name">{{__('Your Google Plus Name')}}</label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('google_plus_name') ? ' has-error' : '' }}" name="google_plus_name" placeholder="{{__('Enter Your Google Plus Name')}}" value="{{$profile->google_plus_name?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fab fa-google-plus-g"></i>&ensp;<label for="google_plus_link">{{__('Your Google Plus Link')}}</label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('google_plus_link') ? ' has-error' : '' }}" name="google_plus_link" placeholder="{{__('Enter Your Google Plus Link')}}" value="{{$profile->google_plus_link?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-crosshairs"></i>&ensp;<label for="aim_link">{{__('Your AIM link')}} </label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('aim_link') ? ' has-error' : '' }}" name="aim_link" placeholder="{{__('Enter Your AIM link')}}" value="{{$profile->aim_link?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fab fa-windows"></i>&ensp;<label for="window_live_link">{{__('Your Window Live link')}} </label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('window_live_link') ? ' has-error' : '' }}" name="window_live_link" placeholder="{{__('Enter Window Live link')}}" value="{{$profile->window_live_link?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fab fa-yahoo"></i>&ensp;<label for="yahoo_link">{{__('Your Yahoo link')}} </label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('yahoo_link') ? ' has-error' : '' }}" name="yahoo_link" placeholder="{{__('Enter Yahoo link')}}" value="{{$profile->yahoo_link?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-phone"></i>&ensp;<label for="icq_link">{{__('Your ICQ link')}} </label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('icq_link') ? ' has-error' : '' }}" name="icq_link" placeholder="{{__('Enter ICQ link')}}" value="{{$profile->icq_link?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fab fa-skype"></i>&ensp;<label for="skype_link">{{__('Your Skype link')}} </label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('skype_link') ? ' has-error' : '' }}" name="skype_link" placeholder="{{__('Enter Skype link')}}" value="{{$profile->skype_link?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fab fa-google"></i>&ensp;<label for="google_talk_link">{{__('Your Google Talk link')}} </label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('google_talk_link') ? ' has-error' : '' }}" name="google_talk_link" placeholder="{{__('Enter Google Talk link')}}" value="{{$profile->google_talk_link?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fab fa-facebook-f"></i>&ensp;<label for="facebook_link">{{__('Your Facebook link')}} </label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('facebook_link') ? ' has-error' : '' }}" name="facebook_link" placeholder="{{__('Enter Facebook link')}}" value="{{$profile->facebook_link?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fab fa-twitter"></i>&ensp;<label for="twitter_link">{{__('Your Twitter link')}} </label>
                            <input type="text" class="form-control has-feedback{{ $errors->has('twitter_link') ? ' has-error' : '' }}" name="twitter_link" placeholder="{{__('Enter Twitter link')}}" value="{{$profile->twitter_link?? ''}}">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-info"></i>&ensp;<label for="detail">{{__('Your Detail')}} </label> <br>
                            <textarea class="form-control has-feedback{{ $errors->has('detail') ? ' has-error' : '' }}" name="detail" id="detail" cols="96" rows="20" placeholder="{{__('Enter Your Bio Detail')}}">{{$profile->detail?? ''}}</textarea>
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