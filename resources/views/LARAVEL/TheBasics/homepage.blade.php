@extends('layouts.app')

@section('content')
<style>
    .mt-60 {
        margin-top: 60px;
    }

    .section-grey {
        padding: 90px 0px 90px 0px;
        background-color: #f9f9f9;
    }

    .serv-section-2 {
        position: relative;
        border: 1px solid #eee;
        background: #fff;
        box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
        border-radius: 5px;
        overflow: hidden;
        padding: 30px;
    }

    .serv-section-2:before {
        position: absolute;
        top: 0;
        right: 0px;
        z-index: 0;
        content: " ";
        width: 120px;
        height: 120px;
        background: #f5f5f5;
        border-bottom-left-radius: 136px;
        transition: all 0.4s ease-in-out;
        -webkit-transition: all 0.4s ease-in-out;
    }

    .serv-section-2-icon {
        position: absolute;
        top: 18px;
        right: 22px;
        max-width: 100px;
        z-index: 1;
        text-align: center;
    }

    .serv-section-2-icon i {
        color: #5f27cd;
        font-size: 48px;
        line-height: 65px;
        transition: all 0.4s ease-in-out;
        -webkit-transition: all 0.4s ease-in-out;
    }

    .serv-section-desc {
        position: relative;
    }

    .serv-section-2 h4 {
        color: #333;
        font-size: 20px;
        font-weight: 500;
        line-height: 1.5;
    }

    .serv-section-2 h5 {
        color: #333;
        font-size: 17px;
        font-weight: 400;
        line-height: 1;
        margin-top: 5px;
    }

    .section-heading-line-left {
        content: '';
        display: block;
        width: 100px;
        height: 3px;
        background: #5f27cd;
        border-radius: 25%;
        margin-top: 15px;
        margin-bottom: 5px;
    }

    .serv-section-2 p {
        margin-top: 25px;
        padding-right: 50px;
    }

    .serv-section-2:hover .serv-section-2-icon i {
        color: #fff;
    }

    .serv-section-2:hover:before {
        background: #5f27cd;
    }
</style>

<div class="container">
    <div class="section-heading center-holder">
        <h3>Learn Laravel is easy</h3>
        <div class="section-heading-line"></div>
        <p>Just 3 months you can learn all the structures of the Laravel Framework</p>
    </div>
    <div class="row mt-60">
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <a href="{{route('laravel.route')}}">
                    <div class="serv-section-2-icon">
                        <i class="fas fa-route"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4>Routing</h4>
                </div>
                <div class="section-heading-line-left"></div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2 serv-section-2-act">
                <a href="{{route('laravel.middleware')}}">
                    <div class="serv-section-2-icon serv-section-2-icon-act">
                        <i class="fas fa-cogs"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4>Middleware</h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <a href="{{route('laravel.csrf')}}">
                    <div class="serv-section-2-icon">
                        <i class="fas fa-signature"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4>CSRF Protection</h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
    </div>
    <div class="row mt-60">
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <a href="{{route('laravel.controller')}}">
                    <div class="serv-section-2-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4>Controllers </h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2 serv-section-2-act">
                <a href="{{route('laravel.request')}}">
                    <div class="serv-section-2-icon serv-section-2-icon-act">
                        <i class="fas fa-question-circle"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4>Request </h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <a href="#">
                    <div class="serv-section-2-icon">
                        <i class="fab fa-replyd"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4> Responses </h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
    </div>
    <div class="row mt-60">
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <a href="#">
                    <div class="serv-section-2-icon">
                        <i class="far fa-eye"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4> Views </h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <a href="#">
                    <div class="serv-section-2-icon">
                        <i class="fas fa-globe-asia"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4> URL Generation </h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <a href="#">
                    <div class="serv-section-2-icon">
                        <i class="fas fa-code"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4> Session </h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
    </div>
    <div class="row mt-60">
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <a href="#">
                    <div class="serv-section-2-icon">
                        <i class="fas fa-check"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4> Validation </h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <a href="#">
                    <div class="serv-section-2-icon">
                        <i class="fas fa-bug"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4> Error Handling </h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-12">
            <div class="serv-section-2">
                <a href="#">
                    <div class="serv-section-2-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                </a>
                <div class="serv-section-desc">
                    <h4> Logging </h4>
                </div>
                <div class="section-heading-line-left"></div>

            </div>
        </div>
    </div>
</div>

@endsection