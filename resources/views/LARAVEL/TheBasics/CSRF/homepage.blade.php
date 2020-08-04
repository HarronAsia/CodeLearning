@extends('layouts.app')

@section('content')
<style>
    .versus {
        position: absolute;
        background: #f7f8f9;
        border-radius: 100%;
        border: 1px solid #9361D4;
        color: #A788D1;
        font-size: 1.25em;
        height: 78px;
        left: 50%;
        margin-left: -39px;
        padding-top: 22px;
        text-align: center;
        top: 50%;
        transform: translateY(-50%);
        width: 78px;
        z-index: 4;
    }

    .divided {
        position: relative;
        background: #f7f8f9;
    }

    .divided::after {
        background: linear-gradient(#f0f7fd 0, #813FD9 50%, #f0f7fd 100%);
        width: 1px;
        top: 100px;
        bottom: 100px;
        left: 50%;
        height: auto;
        right: auto;
        position: absolute;
    }

    @media (max-width: 768px) {
        .divided::after {
            background: linear-gradient(90deg, #f0f7fd 0, #813FD9 50%, #f0f7fd 100%);
            content: "";
            position: absolute;
            top: 50%;
            left: 20px;
            right: 20px;
            height: 1px;
            width: 100%;
        }
    }


    .border-top-0 {
        border-top: 0 !important;
    }

    .border-right-0 {
        border-right: 0 !important;
    }

    .border-left-0 {
        border-left: 0 !important;
    }

    .border-bottom-0 {
        border-bottom: 0 !important;
    }

    @media (min-width: 576px) {
        .border-sm-top {
            border-top: 1px solid #dee2e6 !important;
        }

        .border-sm-right {
            border-right: 1px solid #dee2e6 !important;
        }

        .border-sm-left {
            border-left: 1px solid #dee2e6 !important;
        }

        .border-sm-bottom {
            border-bottom: 1px solid #dee2e6 !important;
        }

        .border-sm-top-0 {
            border-top: 0 !important;
        }

        .border-sm-right-0 {
            border-right: 0 !important;
        }

        .border-sm-left-0 {
            border-left: 0 !important;
        }

        .border-sm-bottom-0 {
            border-bottom: 0 !important;
        }
    }

    @media (min-width: 768px) {
        .border-md-top {
            border-top: 1px solid #dee2e6 !important;
        }

        .border-md-right {
            border-right: 1px solid #dee2e6 !important;
        }

        .border-md-left {
            border-left: 1px solid #dee2e6 !important;
        }

        .border-md-bottom {
            border-bottom: 1px solid #dee2e6 !important;
        }

        .border-md-top-0 {
            border-top: 0 !important;
        }

        .border-md-right-0 {
            border-right: 0 !important;
        }

        .border-md-left-0 {
            border-left: 0 !important;
        }

        .border-md-bottom-0 {
            border-bottom: 0 !important;
        }
    }

    @media (min-width: 992px) {
        .border-lg-top {
            border-top: 1px solid #dee2e6 !important;
        }

        .border-lg-right {
            border-right: 1px solid #dee2e6 !important;
        }

        .border-lg-left {
            border-left: 1px solid #dee2e6 !important;
        }

        .border-lg-bottom {
            border-bottom: 1px solid #dee2e6 !important;
        }

        .border-lg-top-0 {
            border-top: 0 !important;
        }

        .border-lg-right-0 {
            border-right: 0 !important;
        }

        .border-lg-left-0 {
            border-left: 0 !important;
        }

        .border-lg-bottom-0 {
            border-bottom: 0 !important;
        }
    }

    @media (min-width: 1200px) {}

    img {
        width: 100%;
        height: auto;
    }
</style>
<div>
    <section class="divided clearfix">

        <div class="row ">
            <div class="col col-12 col-sm-12 col-md-6 p-lg-5">

                <div class="p-5">
                    <h5 class="h5 text-muted">Form with </h5>
                    <h1 class="h1 mb-5">CSRF Token </h1>
                    <div>
                        <img class="m-auto" src="{{asset('storage/Requirement/csrfForm.PNG')}}">
                    </div>
                    <p>CSRF tokens can prevent CSRF attacks by making it impossible for an attacker to construct a fully valid HTTP request suitable for feeding to a victim user. </p>
                    <p>Since the attacker cannot determine or predict the value of a user's CSRF token, they cannot construct a request with all the parameters that are necessary for the application to honor the request.</p>
                </div>

            </div>
            <div class="versus">VS</div>
            <div class="col col-12 col-sm-12 col-md-6 p-lg-5">

                <div class="p-5">
                    <h5 class="h5 text-muted">Form Without</h5>
                    <h1 class="h1 mb-5">CSRF Token </h1>
                    <div>
                        <img class="m-auto" src="{{asset('storage/Requirement/Formwithoutcsrf.PNG')}}">
                    </div>
                    <p>The attacker can easily get easily construct a request with all the parameters which then they can easily go inside our system </p>
                </div>

            </div>
        </div>
    </section>
    <hr>
    <section class="border-bottom">
        <div class="container">
            <h5>Understanding about CSRF</h5>
            <div class="row text-center ">
                <p>Laravel makes it easy to protect your application from cross-site request forgery (CSRF) attacks. </p>
                <p>Cross-site request forgeries are a type of malicious exploit whereby unauthorized commands are performed on behalf of an authenticated user.</p>
            </div>
        </div>
    </section>
    <hr>

    <section class="border-top">
        <div class="container">
            <div class="row text-center ">
                <div class="col col-12 col-sm-12 col-md-6 col-lg-4 p-5 border-bottom border-sm-bottom border-md-bottom-0 border-md-right">
                    <h5 class="h5 text-muted">Form with </h5>
                    <h1 class="h1 mb-5">CSRF Token </h1>

                    <form action="{{route('laravel.csrf.post')}}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Enter Your Name" required>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col col-12 col-sm-12 col-md-6 col-lg-4 p-5 border-bottom border-sm-bottom border-md-bottom-0 border-lg-right">
                    <h5 class="h5 text-muted">Form Without</h5>
                    <h1 class="h1 mb-5">CSRF Token </h1>

                    <form action="{{route('laravel.nonecsrf.post')}}" method="POST">
                        <input type="text" name="name" placeholder="Enter Your Name" required>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col col-12 col-sm-12 col-md-6 col-lg-4 p-5 border-bottom border-sm-bottom border-md-bottom-0 border-lg-right">
                    <h5 class="h5 text-muted">Test Form</h5>

                    <ul class="navbar-nav mr-auto ">
                        @foreach($csrfs->take(5) as $csrf)
                        <li class="nav-item ">
                            {{$csrf->name}}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection