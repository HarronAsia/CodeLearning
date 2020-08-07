@extends('layouts.app')

@section('content')

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

    <div class="box-part text-center">
        <i class="fab fa-laravel fa-3x" aria-hidden="true"></i>

        <div class="title">
            <h4>{{__('Installation')}}</h4>
        </div>

        <div class="text">
            <span>{{__('The Laravel framework has a few system requirements. All of these requirements are satisfied by the Laravel Homestead virtual machine, so its highly recommended that you use Homestead as your local Laravel development environment.')}}</span>
        </div>

        <a href="{{route('laravel.installation', app()->getLocale())}}">{{__('Learn More')}}</a>

    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

    <div class="box-part text-center">
        <i class="fab fa-laravel fa-3x" aria-hidden="true"></i>

        <div class="title">
            <h4>{{__('The Basics')}}</h4>
        </div>

        <div class="text">
            <span>{{__('Everything you need to know about Laravel')}}</span>
        </div>

        <a href="{{route('laravel.basic', app()->getLocale())}}">{{__('Learn More')}}</a>

    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="background-color: black;color:red;">

    <div class="box-part text-center">
        <i class="fas fa-user-secret fa-6x" aria-hidden="true"></i>

        <div class="title">
            <h4>{{__('Cheat Sheet')}}</h4>
        </div>

        <div class="text">
            <span>{{__('Want to make a website easy without any sweat, Feel free to join in this grand new cheat Sheet. What are you waiting now !! Its absolutely free for anyone because all you need to do is just create an account only.')}}</span>
        </div>
        @guest
        <a href="{{route('login', app()->getLocale())}}">{{__('Join in')}}</a>
        @else
        <a href="{{route('cheat.index', app()->getLocale())}}">{{__('Join in')}}</a>
        @endif
    </div>
</div>

</div>

@endsection