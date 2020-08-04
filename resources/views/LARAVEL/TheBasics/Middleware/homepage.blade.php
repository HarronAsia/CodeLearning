@extends('layouts.app')

@section('content')
<style>
    div {
        display: inline-block;
    }

    .bigger {
        margin: 0;
        font-size: 60px;
        font-weight: 800;
        padding: 20px;
        text-transform: uppercase;
        color: #202020;
        display: inline-block;
        position: relative;
    }

    .text {
        max-width: 600px;
        width: 100%;
        line-height: 24px;
        text-align: left;
        color: #404040;
    }

    img {
        width: 100%;
        height: auto;
    }

    .text.txt-center {
        text-align: center;
    }

    .text a {
        color: #0fe4d2;
    }

    .has-animation {
        position: relative;
    }

    .has-animation p,
    .has-animation img,
    .has-animation h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        opacity: 0;
    }

    .has-animation.animate-in p,
    .has-animation.animate-in img,
    .has-animation.animate-in h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        animation: textHidden 0.1s 1.4s forwards;
    }

    .has-animation.animate-in:before,
    .has-animation.animate-in:after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        z-index: 10;
    }

    .has-animation.animate-in:before {
        background-color: teal;
    }

    .has-animation.animate-in:after {
        background-color: yellowgreen;
        animation-delay: .5s;
    }

    .has-animation.animation-ltr.animate-in:before {
        animation: revealLTR 1.8s ease;
    }

    .has-animation.animation-ltr.animate-in:after {
        animation: revealLTR 1s .6s ease;
    }

    .has-animation.animation-rtl.animate-in:before {
        animation: revealRTL 1.8s ease;
    }

    .has-animation.animation-rtl.animate-in:after {
        animation: revealRTL 1s .6s ease;
    }

    @keyframes revealRTL {
        0% {
            width: 0;
            right: 0;
        }

        65% {
            width: 100%;
            right: 0;
        }

        100% {
            width: 0;
            right: 100%;
        }
    }

    @keyframes revealLTR {
        0% {
            width: 0;
            left: 0;
        }

        65% {
            width: 100%;
            left: 0;
        }

        100% {
            width: 0;
            left: 100%;
        }
    }

    @keyframes textHidden {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>
<div class="container">

    <div class="has-animation animation-ltr" data-delay="100">
        <p class="bigger">Middleware </p>
    </div>

    <div class="has-animation animation-rtl" data-delay="1000">
        <p class="text">Middleware provide a convenient mechanism for filtering HTTP requests entering your application. <strong>For Example: </strong><br>
            1. if the user is not authenticated, the middleware will redirect the user to the login screen. <br>
            2. if the user is authenticated, the middleware will allow the request to proceed further into the application</p>

    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="has-animation animation-ltr" data-delay="1100">
                <h3>Defining Middleware</h3>
                <p class="text">To create a new middleware, use the <strong>make:middleware </strong> Artisan command: </p>
                <p class="text">
                    <strong style="background-color: #59463F;color: white;">
                        php artisan make:middleware CheckSomething
                    </strong>
                </p>
                <p class="text">This command will place a new <strong>checkSomething</strong> class within your <strong>App/Http/Middleware</strong> directory.</p>
            </div>
        </div>
        <div class="col">
            <div class="has-animation animation-rtl" data-delay="1100">
                <img src="{{asset('storage/Requirement/makeMiddleware.PNG')}}" width="1200px" height="840px" />
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="has-animation animation-ltr" data-delay="1100">
                <h5>Now let's check if the User is Admin</h5>
                <p class="text">if User is having a role admin, then it will proceed the User to continue further. <br>
                    If not, it will stop the User from going any further and return the page unauthorized page.</p>
            </div>
        </div>
        <div class="col">
            <div class="has-animation animation-rtl" data-delay="1100">
                <img src="{{asset('storage/Requirement/CheckAdminMiddleware.PNG')}}" width="1200px" height="840px" />
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="has-animation animation-ltr" data-delay="1100">
                <h3>Registering Middleware</h3>
                <p class="text">To register a middleware, go to <strong>Kernel.php</strong>. It will be outside of the folder <strong>Middleware</strong> and inside the <strong>Http</strong> folder </p>
                <p class="text">Then search for the route Middleware variable. Because that's where we want to imply the middleware into route.</p>
                <p class="text">You can see in the photo , there is a line called <strong>'admin' => \App\Http\Middleware\CheckAdmin::class,</strong></p>
                <p><small>So the word 'admin' is like the short term definition for Middleware <strong>CheckAdmin</strong> and it will get all the functions inside the class <strong>CheckAdmin</strong> </small></p>
                <p><small></small></p>
            </div>
        </div>
        <div class="col">
            <div class="has-animation animation-rtl" data-delay="1100">
                <img src="{{asset('storage/Requirement/middleware-register.PNG')}}" width="1200px" height="840px" />
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            <div class="has-animation animation-ltr" data-delay="1100">
                <h3>Using Middleware</h3>
                <p class="text">Go to the <strong>routes/web.php</strong> and place it like this. </p>
                <p class="text">We have 2 ways of using the imply the middleware into route.</p>
                <p class="text">
                    <h4>
                        Use it as a group
                    </h4>
                </p>
                <p><small>For grouping all the routes and imply the middleware inside, we can easily tell that no one can use these beside Admin</small></p>
                <p class="text">
                    <h4>
                        Use it as an individual
                    </h4>
                </p>
                <p><small>For individual and imply the middleware at the end, we can easily tell that this route can only be used by Admin</small></p>
            </div>
        </div>
        <div class="col">
            <div class="has-animation animation-rtl" data-delay="1100">
                <img src="{{asset('storage/Requirement/use-middleware.PNG')}}" width="1200px" height="840px" />
            </div>
        </div>
    </div>
    <hr>
</div>
@endsection