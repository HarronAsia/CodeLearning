@extends('layouts.app')

@section('content')

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

    <div class="box-part text-center">
        <i class="fab fa-laravel fa-3x" aria-hidden="true"></i>

        <div class="title">
            <h4>LARAVEL</h4>
        </div>

        <div class="text">
            <span>Laravel is an open-source PHP framework, which is robust and easy to understand. It follows a model-view-controller design pattern. Laravel reuses the existing components of different frameworks which helps in creating a web application. The web application thus designed is more structured and pragmatic.</span>
        </div>

        <a href="{{route('laravel')}}">Learn More</a>

    </div>
</div>


@endsection