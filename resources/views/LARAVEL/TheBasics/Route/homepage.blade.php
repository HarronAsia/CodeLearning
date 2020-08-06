@extends('layouts.app')

@section('content')
<style>
    body {
        background: #f1f1f2;
    }

    h4 {
        text-align: center;
        margin: 30px 0px;
        color: #444;
    }

    .mt-10 {
        margin-top: 20px;
    }

    a:hover,
    a:focus {
        text-decoration: none;
        outline: none;
    }



    /******************* Accordion Demo - 5 *****************/
    #accordion5 .panel {
        border: none;
        border-radius: 0;
        box-shadow: none;
        margin: 0 0 15px 50px;
    }

    #accordion5 .panel-title a {
        display: block;
        padding: 10px 20px 10px 60px;
        background: #fe5f55;
        border-radius: 30px;
        border: 2px solid #fe5f55;
        font-size: 20px;
        font-weight: 400;
        color: #fff;
        position: relative;
    }

    #accordion5 .panel-title a.collapsed {
        border: 2px solid #bbb;
        background: #fff;
        color: #bbb;
    }

    #accordion5 .panel-title a:before,
    #accordion5 .panel-title a.collapsed:before {
        content: "\f068";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        width: 60px;
        height: 60px;
        line-height: 60px;
        border-radius: 50%;
        background: #fe5f55;
        font-size: 18px;
        color: #fff;
        text-align: center;
        border-right: 3px solid #fff;
        position: absolute;
        top: -10px;
        left: -30px;
        z-index: 1;
        transition: all 0.3s ease 0s;
    }

    #accordion5 .panel-title a.collapsed:before {
        content: "\f067";
        background: #bbb;
        border: none;
    }

    #accordion5 .panel-body {
        padding: 10px 15px 0;
        margin: 0 0 0 30px;
        border: none;
        font-size: 14px;
        color: #333;
        line-height: 28px;
        position: relative;
    }

    #accordion5 .panel-body:before {
        content: "";
        display: block;
        width: 5px;
        height: 90%;
        background: #fe5f55;
        position: absolute;
        top: 0;
        left: -30px;
    }

    #accordion5 .panel-body:after {
        content: "";
        border-top: 20px solid #fe5f55;
        border-left: 20px solid transparent;
        border-right: 20px solid transparent;
        position: absolute;
        bottom: 0;
        left: -48px;
    }
</style>


<div class="col-md-12">
    <h1>{{__('Routing')}}</h1>

    <div class="panel-group" id="accordion5" role="tablist" aria-multiselectable="true">
        <!------------------------------------------------------ Basic Route ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne5">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
                       {{__('Basic Route')}}
                    </a>
                </h4>
            </div>
            <div id="collapseOne5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne5">
                <div class="panel-body">
                    <strong>
                        <p>Route::get('/{{__('something')}} ({{__('You can name anything you want')}})','{{__('Your Controller')}}@{{__('Your Action')}}');</p>
                    </strong>
                    <h5>{{__('Explaination')}}</h5>
                    <p><small>{{__('The Above code is that whenever you type /something on your URL , it will get the request and go to your controller which then activate the action that set for that route only')}}</small></p>
                    <h5>{{__('Example')}}</h5>
                    <p><small>donaltrump.suck.com/something </small></p>
                    <h5>{{__('More Routes Method')}}</h5>
                    <p> <strong>Route::get('/{{__('something')}} ({{__('You can name anything you want')}})','{{__('Your Controller')}} @ {{__('Your Action')}}'); </strong> <br>
                        <small>{{__('This Route will retrieve the /something in the URL')}} </small>
                    </p>
                    <p> <strong>Route::post('/{{__('something')}} ({{__('You can name anything you want')}})','{{__('Your Controller')}} @ {{__('Your Action')}}'); </strong><br>
                        <small>{{__('This Route will insert the /something to the URL')}}</small>
                    </p>
                    <p> <strong>Route::put('/{{__('something')}} ({{__('You can name anything you want')}})','{{__('Your Controller')}} @ {{__('Your Action')}}'); </strong><br>
                        <small>{{__('This Route will ask you to send the /something with the value you want to update.')}} <br>
                            e.g: Route::put('/{{__('something')}}/{ {{__('some value')}} }', <br>
                            array( <br>
                            'as' => '/{{__('something')}}/{{__('Your Action')}}', <br>
                            'uses' => '{{__('Your Controller')}} @ {{__('Your Action')}}' <br>
                            ));</small>
                    </p>
                    <p> <strong>Route::delete('/{{__('something')}} ({{__('You can name anything you want')}})','{{__('Your Controller')}} @ {{__('Your Action')}}'); </strong><br>
                        <small>{{__('This Route will ask you to send the /something with the value you want to delete.')}} <br>
                            e.g: Route::delete('/{{__('something')}}/{ {{__('some value')}} }', <br>
                            array( <br>
                            'as' => '/{{__('something')}}/{{__('Your Action')}}', <br>
                            'uses' => '{{__('Your Controller')}} @ {{__('Your Action')}}' <br>
                            ));</small>
                    </p>
                    <p><small>{{__('Route is basicially your URL, which is anything behind your main domain, and it mainly stored in the routes/web.php')}} </small></p>

                </div>
            </div>
        </div>
        <!------------------------------------------------------ Basic Route ----------------------------------------------->

        <!------------------------------------------------------ Redirect Route ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo5">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseTwo5" aria-expanded="true" aria-controls="collapseTwo5">
                        {{__('Redirect Routes')}}
                    </a>
                </h4>
            </div>
            <div id="collapseTwo5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo5">
                <div class="panel-body">
                    <p>{{__('If you are defining a route that redirects to another URI, you may use the Route::redirect method. This method provides a convenient shortcut so that you do not have to define a full route or controller for performing a simple redirect:')}}</p>
                    <h5>{{__('Example')}}</h5>
                    <strong>
                        <p>Route::redirect('/{{__('here')}}', '/{{__('there')}}');</p>
                    </strong>
                    <p><small>{{__('You can customize the option for the redirect as well')}}</small></p>
                    <h5>{{__('Example')}}</h5>
                    <strong>
                        <p>Route::redirect('/{{__('here')}}', '/{{__('there')}}', 301);</p>
                    </strong>
                    <h5>{{__('Redirect Number')}}</h5>
                    <p><small><strong>300</strong> {{__('Mutiple Choice: Indicates multiple options for the resource and could be used to present different format options for video, list files with different extensions, or word sense disambiguation')}}</small></p>
                    <p><small><strong>301</strong> {{__('Moved Permanently: This basically will make all the routes to move from here to there permanently')}} </small></p>
                    <p><small><strong>302</strong> {{__('Moved Temporarily: By default, redirect will return to this code because it will only remember the route temporary')}}</small></p>
                    <p><small><strong>303</strong> {{__('See Other: he response to the request can be found under another URI using a GET method. When received in response to a PUT, it should be assumed that the server has received the data and the redirect should be issued with a separate GET message')}}</small></p>
                    <p><small><strong>307</strong> {{__('Temporary Redirect: It different from the 302. With the advent of HTTP 1.1, 307 has replaced it as a valid temporary redirect.')}} <br>
                            {{__('While HTTP method in 302 can easily change , 307 requires all HTTP method should remain the same')}}</small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Redirect Route ----------------------------------------------->

        <!------------------------------------------------------ View Route ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseThree5" aria-expanded="false" aria-controls="collapseThree5">
                        {{__('View Routes')}}
                    </a>
                </h4>
            </div>
            <div id="collapseThree5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree5">
                <div class="panel-body">
                    <p>{{__('If your route only needs to return a view, you may use the Route::view method. Like the redirect method, this method provides a simple shortcut so that you do not have to define a full route or controller')}}</p>
                    <h5>{{__('Example')}}</h5>
                    <strong>
                        <p>Route::view('/{{__('welcome')}}', 'welcome');</p>
                    </strong>
                    <p><small>{{__('In here , when the Route get the welcome it will return the views.welcome.blade.php')}} </small></p>
                    <p>{{__('You can also attach the value you want the page to have inside the method')}}</p>
                    <h5>{{__('Example')}}</h5>
                    <strong>
                        <p>Route::view('/{{__('welcome')}}', '{{__('welcome')}}',['{{__('name')}}'=>'Harron']);</p>
                    </strong>
                    <p><small>{{__('In here , when the Route get the welcome it will return the views.welcome.blade.php with the value name is Harron')}} </small></p>
                    <p>{{__('You can also attach the Page inside folder as well')}}</p>
                    <strong>
                        <p>Route::view('/{{__('welcome')}}', '{{__('Your Folder')}}.welcome');</p>
                    </strong>
                    <p><small>{{__('In here , when the Route get the welcome it will return theviews.YourFolder.welcome.blade.php')}} </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ View Route ----------------------------------------------->

        <!------------------------------------------------------ Required Parameters ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseFour5" aria-expanded="false" aria-controls="collapseFour5">
                        {{__('Required Parameters')}}
                    </a>
                </h4>
            </div>
            <div id="collapseFour5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour5">
                <div class="panel-body">
                    <p>{{__('Sometimes inside your project, you will want to get something dynamically. You can easily set it like this')}}</p>
                    <h5>{{__('Example')}}</h5>
                    <strong>
                        <p>Route::get('/{{__('user')}}/{id}', '{{__('Your Controller')}}@{{__('Your Action')}}');</p>
                    </strong>
                    <p><small>{{__('In here , {id} act as a dynamic variable which will fetch the user id automatically')}}</small></p>
                    <p>{{__('This method will help you to easily create a website with many users without having to set static for each user . But it also contains the error which you will encounter everytime you code. Its called Conflicting routes ')}}</p>
                    <h5>{{__('Problem Example')}}</h5>
                    <div class="row">
                        <div class="col">
                            <strong>
                                <p>Route::get('/{{__('user')}}/{id}', '{{__('Your Controller')}} @ {{__('Your Action')}}');</p>
                            </strong>
                        </div>
                        <div class="col">
                            <strong>
                                <p> Route::get('/{{__('something')}}/{id}', '{{__('Your Controller')}} @ {{__('Your Action')}}');</p>
                            </strong>
                        </div>
                    </div>
                    <p><small>{{__('In the problem here , the framework will detect the route with the variable {id} behind so whenever you typed /something/{id}, it will redirect to /user/{id}. ')}}</small></p>
                    <h5>{{__('Solution')}}</h5>
                    <div class="row">
                        <div class="col">
                            <strong>
                                <p>Route::get('/{{__('user')}}/{id}', function ($id) { <br>
                                    return '{{__('User')}} '.$id; <br>
                                    });</p>
                            </strong>
                        </div>
                        <div class="col">
                            <strong>
                                <p>Route::get('/{{__('something')}}/{id}', function ($id) { <br>
                                    return '{{__('Something')}} '.$id; <br>
                                    });</p>
                            </strong>
                        </div>
                    </div>
                    <p><small>{{__('In here , the {id},which has been attached to the variable $id, will go to Eloquent(which is Model) User and look for the id inside the Eloquentand it will go the same as the Something.')}} </small></p>
                    <h5>{{__('Many Parameters')}}</h5>
                    <p><small> {{__('You can also define many parameters inside the Route as well')}}</small></p>
                    <strong>
                        <p>
                            Route::get('/user/{userid}/something/{somethingid}', function ($userid,$somethingid) { <br>
                            return '{{__('User')}} '.$userid, <br>
                            '{{__('Something')}}'.$somethingid;
                            });
                        </p>
                    </strong>
                    <p style="color: red;">{{__('Make sure you define dynamic parameter differently and it has to be in order')}} </p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Required Parameters ----------------------------------------------->

        <!------------------------------------------------------ Name Route ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingsix5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseSix5" aria-expanded="false" aria-controls="collapseSix5">
                        {{__('Named Routes')}}
                    </a>
                </h4>
            </div>
            <div id="collapseSix5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix5">
                <div class="panel-body">
                    <p>{{__('Named routes allow the convenient generation of URLs or redirects for specific routes. You may specify a name for a route by chaining the name behind the Route')}}</p>
                    <h5>{{__('Example')}}</h5>
                    <div class="row">
                        <div class="col">
                            <strong>
                                <p>Route::get('/{{__('something')}}', '{{__('Your Controller')}} @ {{__('Your Action')}}')->name('{{__('name something')}}');</p>
                            </strong>
                        </div>
                        <div class="col">
                            <strong>
                                <p>
                                    Route::get('/{{__('something')}}', function () { <br>
                                    // <br>
                                    })->name('{{__('name something')}}');
                                </p>
                            </strong>
                        </div>
                    </div>
                    <p><small>{{__('By defining name for the route you can easily use the name in the Front End without having to write all the URL path')}}</small></p>
                    <p style="color: red;">{{__('Make sure you define each name diffrently and it must be unique')}} </p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Name Route ----------------------------------------------->

        <!------------------------------------------------------ Route Group ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingseven5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseSeven5" aria-expanded="false" aria-controls="collapseSeven5">
                        {{__('Route Groups')}}
                    </a>
                </h4>
            </div>
            <div id="collapseSeven5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingseven5">
                <div class="panel-body">
                    <p>{{__('Route groups allow you to share route attributes, such as middleware or namespaces, across a large number of routes without needing to define those attributes on each individual route')}}</p>
                    <h5>{{__('Example')}}</h5>
                    <strong>
                        <p>
                            Route::group([ <br>
                            $attributes],function(){ <br>
                            Route::get('/{{__('something')}}','{{__('Your Controller')}} @ {{__('Your Action')}}'); <br>
                            Route::post('/{{__('something')}}','{{__('Your Controller')}} @ {{__('Your Action')}}'); <br>
                            Route::put('/{{__('something')}}','{{__('Your Controller')}} @ {{__('Your Action')}}'); <br>
                            });
                        </p>
                    </strong>
                    <p><small>{{__('By Using group , any routes inside the group will be served under this group and they will have all benefits of that groups')}} </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Route Group ----------------------------------------------->

        <!------------------------------------------------------ Route Namespace  ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingeight5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseEight5" aria-expanded="false" aria-controls="collapseEight5">
                       {{__('Namespaces')}}
                    </a>
                </h4>
            </div>
            <div id="collapseEight5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeight5">
                <div class="panel-body">
                    <p>{{__('Another common use-case for route groups is assigning the same PHP namespace to a group of controllers using the namespace method')}}</p>
                    <h5>{{__('Example')}}</h5>
                    <strong>
                        <p>
                            Route::namespace('{{__('Something')}}')->group(function () { <br>
                            Route::get('/{{__('something')}}','{{__('Something')}}@{{__('YourAction')}}'); <br>
                            Route::post('/{{__('something')}}','{{__('Something')}}@{{__('YourAction')}}'); <br>
                            Route::put('/{{__('something')}}','{{__('Something')}}@{{__('YourAction')}}'); <br>
                            }); <br>
                        </p>
                    </strong>
                    <p><small>{{__('By Using namespace , any routes inside the group will have all the functions in the App/Http/Controllers/Something')}} </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Route Namespace  ----------------------------------------------->

        <!------------------------------------------------------ Route Prefixes  ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingnine5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseNine5" aria-expanded="false" aria-controls="collapseNine5">
                        {{__('Route Prefixes')}}
                    </a>
                </h4>
            </div>
            <div id="collapseNine5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingnine5">
                <div class="panel-body">
                    <p>{{__('YOu can easily change the route name by using Prefix method')}}</p>
                    <h5>{{__('Example')}}</h5>
                    <strong>
                        <p>
                            Route::prefix('{{__('before-something')}}')->group(function () { <br>
                            Route::get('/{{__('something')}}','{{__('Your Controller')}} @ {{__('Your Action')}}'); <br>
                            Route::post('/{{__('something')}}','{{__('Your Controller')}} @ {{__('Your Action')}}'); <br>
                            Route::put('/{{__('something')}}','{{__('Your Controller')}} @ {{__('Your Action')}}'); <br>
                            }); <br>
                        </p>
                    </strong>
                    <p><small>{{__('By Using prefixes , any routes inside the group will have the URL like this /before-something/something')}} </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Route Prefixes  ----------------------------------------------->

        <!------------------------------------------------------ Fallback Routes  ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingten5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseTen5" aria-expanded="false" aria-controls="collapseTen5">
                        {{__('Fallback Routes')}}
                    </a>
                </h4>
            </div>
            <div id="collapseTen5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingten5">
                <div class="panel-body">
                    <p>{{__('When you type in the wrong route , it will return the page with all the errors. You can easily hide it with Route::fallback method.')}}</p>
                    <h5>{{__('Example')}}</h5>
                    <strong>
                        <p>
                            Route::fallback(function () { <br>
                            Route::get('/{{__('something')}}','{{__('YourController')}}@{{__('YourAction')}}');
                            }); <br>
                        </p>
                    </strong>
                    <p><small>{{__('By Using fallback , any routes inside this will automatically  return the 404 page if found unhandled requests')}} </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Fallback Routes  ----------------------------------------------->
    </div>
</div>

@endsection