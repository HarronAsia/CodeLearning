@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: black;
        color: crimson;
    }

    .services-box {
        padding: 30px;
        background-color: #212121;
        border-left: 2px solid #292929;
        -webkit-transition: 0.6s;
        -moz-transition: 0.6s;
        -o-transition: 0.6s;
        transition: 0.6s;
    }

    .services-icon {
        font-size: 40px;
        color: #8980fe;
    }

    .service-name {
        margin-bottom: 15px;
        margin-top: 15px;
    }

    .text-small {
        font-size: 16px;
        color: #fff;
    }

    .btn-default {
        color: #fff;
        background-color: transparent;
        border-color: #535353;
    }

    .btn {
        border-radius: 45px;
        margin-bottom: 1px;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        font-weight: 300;
        letter-spacing: 2px;
        font-size: 10px;
        -webkit-transition: all 0.5s ease 0s;
        -moz-transition: all 0.5s ease 0s;
        -o-transition: all 0.5s ease 0s;
        transition: all 0.5s ease 0s;
    }

    .mt10 {
        margin-top: 10px !important;
    }

    .h3,
    h3 {
        font-size: 24px;
    }

    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 100;
        color: #fff;
    }

    .row div {
        padding-left: 30px;
        padding-top: 30px;
    }
</style>

<h1>{{__('Welcome to cheat environment!')}}</h1>
<div class="row">

    <div class="col-xs-12 col-sm-6 col-md-4 ">
        <div class="services-box leftReveal" data-sr-id="13">

            <i class="fa fa-code fa-2x services-icon"></i>
            <h3 class="service-name">1. {{__('User')}}</h3>
            <p class="text-small">
                <ul>
                    <li>{{__('Edit')}}</li>
                </ul>
            </p>
            <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item1-services">{{__('Read More')}}</button>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="services-box leftReveal" data-sr-id="13">

            <i class="fa fa-code fa-2x services-icon"></i>
            <h3 class="service-name">2. {{__('Profile')}}</h3>
            <p class="text-small">
                <ul>
                    <li>{{__('Add')}}</li>
                    <li>{{__('Edit')}}</li>
                </ul>
            </p>
            <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item1-services">{{__('Read More')}}</button>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="services-box leftReveal" data-sr-id="13">

            <i class="fa fa-code fa-2x services-icon"></i>
            <h3 class="service-name">3. {{__('Community')}}</h3>
            <p class="text-small">
                <ul>
                    <li>{{__('Add')}}</li>
                    <li>{{__('Edit')}}</li>
                    <li>{{__('Delete')}}</li>
                    <li>{{__('Restore')}}</li>
                </ul>
            </p>
            <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item1-services">{{__('Read More')}}</button>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="services-box leftReveal" data-sr-id="13">

            <i class="fa fa-code fa-2x services-icon"></i>
            <h3 class="service-name">4. {{__('Post')}}</h3>
            <p class="text-small">
                <ul>
                    <li>{{__('Add')}}</li>
                    <li>{{__('Edit')}}</li>
                    <li>{{__('Delete')}}</li>
                    <li>{{__('Restore')}}</li>
                </ul>
            </p>
            <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item1-services">{{__('Read More')}}</button>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="services-box leftReveal" data-sr-id="13">

            <i class="fa fa-code fa-2x services-icon"></i>
            <h3 class="service-name">5. {{__('Comment System')}}</h3>
            <p class="text-small">
                <ul>
                    <li>{{__('Add')}}</li>
                    <li>{{__('Edit')}}</li>
                    <li>{{__('Delete')}}</li>
                    <li>{{__('Restore')}}</li>
                </ul>
            </p>
            <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item1-services">{{__('Read More')}}</button>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="services-box leftReveal" data-sr-id="13">

            <i class="fa fa-code fa-2x services-icon"></i>
            <h3 class="service-name">6. {{__('Like System')}}</h3>
            <p class="text-small">
                <ul>
                    <li>{{__('Like')}}</li>
                    <li>{{__('Unlike')}}</li>
                </ul>
            </p>
            <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item1-services">{{__('Read More')}}</button>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="services-box leftReveal" data-sr-id="13">

            <i class="fa fa-code fa-2x services-icon"></i>
            <h3 class="service-name">7. {{__('Follow System')}}</h3>
            <p class="text-small">
                <ul>
                    <li>{{__('Follow')}}</li>
                    <li>{{__('UnFollow')}}</li>
                </ul>
            </p>
            <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item1-services">{{__('Read More')}}</button>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="services-box leftReveal" data-sr-id="13">

            <i class="fa fa-code fa-2x services-icon"></i>
            <h3 class="service-name">8. {{__('Language')}}</h3>
            <p class="text-small">
                <ul>
                    <li>{{__('English')}}</li>
                    <li>{{__('Japan')}}</li>
                    <li>{{__('VietNam')}}</li>
                </ul>
            </p>
            <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item1-services">{{__('Read More')}}</button>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="services-box leftReveal" data-sr-id="13">

            <i class="fa fa-code fa-2x services-icon"></i>
            <h3 class="service-name">9. {{__('Notification')}}</h3>
            <p class="text-small">
                <ul>
                    <li>{{__('Show Notification for each User')}}</li>
                    <li>{{__('Read At')}}</li>
                    <li>{{__('Read All')}}</li>
                </ul>
            </p>
            <button type="button" class="btn btn-default mt10" data-toggle="modal" data-target="#item1-services">{{__('Read More')}}</button>
        </div>
    </div>
</div>

@endsection