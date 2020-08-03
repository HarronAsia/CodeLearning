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
    <h1>Routing</h1>

    <div class="panel-group" id="accordion5" role="tablist" aria-multiselectable="true">
        <!------------------------------------------------------ Basic Route ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne5">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
                        Basic Route
                    </a>
                </h4>
            </div>
            <div id="collapseOne5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne5">
                <div class="panel-body">
                    <strong>
                        <p>Route::get('/something(You can name anything you want)','YourController@YourAction');</p>
                    </strong>
                    <h5>Explaination</h5>
                    <p><small>The Above code is that whenever you type /something on your URL , it will get the request and go to your controller which then activate the action that set for that route only</small></p>
                    <h5>Example</h5>
                    <p><small>donaltrump.suck.com/something </small></p>
                    <h5>More Routes Method</h5>
                    <p> <strong>Route::get('/something(You can name anything you want)','YourController@YourAction'); </strong> <br>
                        <small>This Route will retrieve the /something in the URL </small>
                    </p>
                    <p> <strong>Route::post('/something(You can name anything you want)','YourController@YourAction'); </strong><br>
                        <small>This Route will insert the /something to the URL</small>
                    </p>
                    <p> <strong>Route::put('/something(You can name anything you want)','YourController@YourAction'); </strong><br>
                        <small>This Route will ask you to send the /something with the value you want to update. <br>
                            e.g: Route::put('/something/{some-value}', <br>
                            array( <br>
                            'as' => '/something/YourAction', <br>
                            'uses' => 'YourController@YourAction' <br>
                            ));</small>
                    </p>
                    <p> <strong>Route::delete('/something(You can name anything you want)','YourController@YourAction'); </strong><br>
                        <small>This Route will ask you to send the /something with the value you want to delete. <br>
                            e.g: Route::delete('/something/{some-value}', <br>
                            array( <br>
                            'as' => '/something/YourAction', <br>
                            'uses' => 'YourController@YourAction' <br>
                            ));</small>
                    </p>
                    <p><small>Route is basicially your URL, which is anything behind your main domain, and it mainly stored in the <strong>routes/web.php</strong></small></p>

                </div>
            </div>
        </div>
        <!------------------------------------------------------ Basic Route ----------------------------------------------->

        <!------------------------------------------------------ Redirect Route ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo5">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseTwo5" aria-expanded="true" aria-controls="collapseTwo5">
                        Redirect Routes
                    </a>
                </h4>
            </div>
            <div id="collapseTwo5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo5">
                <div class="panel-body">
                    <p>If you are defining a route that redirects to another URI, you may use the <strong>Route::redirect</strong> method. This method provides a convenient shortcut so that you do not have to define a full route or controller for performing a simple redirect:</p>
                    <h5>Example</h5>
                    <strong>
                        <p>Route::redirect('/here', '/there');</p>
                    </strong>
                    <p><small>You can customize the option for the redirect as well</small></p>
                    <h5>Example</h5>
                    <strong>
                        <p>Route::redirect('/here', '/there', 301);</p>
                    </strong>
                    <h5>Redirect Number</h5>
                    <p><small><strong>300</strong> Mutiple Choice: Indicates multiple options for the resource and could be used to present different format options for video, list files with different extensions, or word sense disambiguation</small></p>
                    <p><small><strong>301</strong> Moved Permanently: This basically will make all the /here into /there permanently </small></p>
                    <p><small><strong>302</strong> Moved Temporarily: By default, redirect will return to this code because it will only remember the route temporary</small></p>
                    <p><small><strong>303</strong> See Other: he response to the request can be found under another URI using a GET method. When received in response to a PUT, it should be assumed that the server has received the data and the redirect should be issued with a separate GET message</small></p>
                    <p><small><strong>307</strong> Temporary Redirect: It different from the 302. With the advent of HTTP 1.1, 307 has replaced it as a valid temporary redirect. <br>
                            While HTTP method in 302 can easily change , 307 requires all HTTP method should remain the same</small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Redirect Route ----------------------------------------------->

        <!------------------------------------------------------ View Route ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseThree5" aria-expanded="false" aria-controls="collapseThree5">
                        View Routes
                    </a>
                </h4>
            </div>
            <div id="collapseThree5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree5">
                <div class="panel-body">
                    <p>If your route only needs to return a view, you may use the <strong>Route::view</strong> method. Like the redirect method, this method provides a simple shortcut so that you do not have to define a full route or controller</p>
                    <h5>Example</h5>
                    <strong>
                        <p>Route::view('/welcome', 'welcome');</p>
                    </strong>
                    <p><small>In here , when the Route get the <strong>/welcome</strong> it will return the <strong>views.welcome.blade.php</strong> </small></p>
                    <p>You can also attach the value you want the page to have inside the method</p>
                    <h5>Example</h5>
                    <strong>
                        <p>Route::view('/welcome', 'welcome',['name'=>'Harron']);</p>
                    </strong>
                    <p><small>In here , when the Route get the <strong>/welcome</strong> it will return the <strong>views.welcome.blade.php</strong> with the value name is Harron </small></p>
                    <p>You can also attach the Page inside folder as well</p>
                    <strong>
                        <p>Route::view('/welcome', 'YourFolder.welcome');</p>
                    </strong>
                    <p><small>In here , when the Route get the <strong>/welcome</strong> it will return the <strong>views.YourFolder.welcome.blade.php</strong> </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ View Route ----------------------------------------------->

        <!------------------------------------------------------ Required Parameters ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingFour5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseFour5" aria-expanded="false" aria-controls="collapseFour5">
                        Required Parameters
                    </a>
                </h4>
            </div>
            <div id="collapseFour5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour5">
                <div class="panel-body">
                    <p>Sometimes inside your project, you will want to get something dynamically. You can easily set it like this</p>
                    <h5>Example</h5>
                    <strong>
                        <p>Route::get('/user/{id}', 'YourController@YourAction');</p>
                    </strong>
                    <p><small>In here , {id} act as a dynamic variable which will fetch the user id automatically</small></p>
                    <p>This method will help you to easily create a website with many users without having to set static for each user . But it also contains the error which you will encounter everytime you code. It's called <strong>Conflicting routes</strong> </p>
                    <h5>Problem Example</h5>
                    <div class="row">
                        <div class="col">
                            <strong>
                                <p>Route::get('/user/{id}', 'YourController@YourAction');</p>
                            </strong>
                        </div>
                        <div class="col">
                            <strong>
                                <p> Route::get('/something/{id}', 'YourController@YourAction');</p>
                            </strong>
                        </div>
                    </div>
                    <p><small>In the problem here , the framework will detect the route with the variable {id} behind so whenever you typed /something/{id}, it will redirect to /user/{id}. </small></p>
                    <h5>Solution</h5>
                    <div class="row">
                        <div class="col">
                            <strong>
                                <p>Route::get('/user/{id}', function ($id) { <br>
                                    return 'User '.$id; <br>
                                    });</p>
                            </strong>
                        </div>
                        <div class="col">
                            <strong>
                                <p>Route::get('/something/{id}', function ($id) { <br>
                                    return 'Something '.$id; <br>
                                    });</p>
                            </strong>
                        </div>
                    </div>
                    <p><small>In here , the {id},which has been attached to the variable $id, will go to Eloquent(which is Model) User and look for the id inside the Eloquentand it will go the same as the Something. </small></p>
                    <h5>Many Parameters</h5>
                    <p><small> You can also define many parameters inside the Route as well</small></p>
                    <strong>
                        <p>
                            Route::get('/user/{userid}/something/{somethingid}', function ($userid,$somethingid) { <br>
                            return 'User '.$userid, <br>
                            'Something'.$somethingid;
                            });
                        </p>
                    </strong>
                    <p style="color: red;">Make sure you define dynamic parameter differently and it has to be in order </p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Required Parameters ----------------------------------------------->

        <!------------------------------------------------------ Name Route ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingsix5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseSix5" aria-expanded="false" aria-controls="collapseSix5">
                        Named Routes
                    </a>
                </h4>
            </div>
            <div id="collapseSix5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix5">
                <div class="panel-body">
                    <p>Named routes allow the convenient generation of URLs or redirects for specific routes. You may specify a name for a route by chaining the <strong>name</strong> behind the Route</p>
                    <h5>Example</h5>
                    <div class="row">
                        <div class="col">
                            <strong>
                                <p>Route::get('/something', 'YourController@YourAction')->name('name-something');</p>
                            </strong>
                        </div>
                        <div class="col">
                            <strong>
                                <p>
                                    Route::get('/something', function () { <br>
                                    // <br>
                                    })->name('name-something');
                                </p>
                            </strong>
                        </div>
                    </div>
                    <p><small>By defining name for the route you can easily use the name in the <strong>View</strong> without having to write all the URL path</small></p>
                    <p style="color: red;">Make sure you define each name diffrently and it must be unique </p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Name Route ----------------------------------------------->

        <!------------------------------------------------------ Route Group ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingseven5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseSeven5" aria-expanded="false" aria-controls="collapseSeven5">
                        Route Groups
                    </a>
                </h4>
            </div>
            <div id="collapseSeven5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingseven5">
                <div class="panel-body">
                    <p>Route groups allow you to share route attributes, such as middleware or namespaces, across a large number of routes without needing to define those attributes on each individual route</p>
                    <h5>Example</h5>
                    <strong>
                        <p>
                            Route::group([ <br>
                            $attributes],function(){ <br>
                            Route::get('/something','YourController@YourAction'); <br>
                            Route::post('/something','YourController@YourAction'); <br>
                            Route::put('/something','YourController@YourAction'); <br>
                            });
                        </p>
                    </strong>
                    <p><small>By Using group , any routes inside the group will be served under this group and they will have all benefits of that groups </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Route Group ----------------------------------------------->

        <!------------------------------------------------------ Route Namespace  ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingeight5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseEight5" aria-expanded="false" aria-controls="collapseEight5">
                        Namespaces
                    </a>
                </h4>
            </div>
            <div id="collapseEight5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeight5">
                <div class="panel-body">
                    <p>Another common use-case for route groups is assigning the same PHP namespace to a group of controllers using the <strong>namespace</strong> method</p>
                    <h5>Example</h5>
                    <strong>
                        <p>
                            Route::namespace('Something')->group(function () { <br>
                            Route::get('/something','Something@YourAction'); <br>
                            Route::post('/something','Something@YourAction'); <br>
                            Route::put('/something','Something@YourAction'); <br>
                            }); <br>
                        </p>
                    </strong>
                    <p><small>By Using namespace , any routes inside the group will have all the functions in the <strong>App\Http\Controllers\Something</strong> </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Route Namespace  ----------------------------------------------->

        <!------------------------------------------------------ Route Prefixes  ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingnine5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseNine5" aria-expanded="false" aria-controls="collapseNine5">
                        Route Prefixes
                    </a>
                </h4>
            </div>
            <div id="collapseNine5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingnine5">
                <div class="panel-body">
                    <p>YOu can easily change the route name by using <strong>prefix</strong> method</p>
                    <h5>Example</h5>
                    <strong>
                        <p>
                            Route::prefix('before-something')->group(function () { <br>
                            Route::get('/something','YourController@YourAction'); <br>
                            Route::post('/something','YourController@YourAction'); <br>
                            Route::put('/something','YourController@YourAction'); <br>
                            }); <br>
                        </p>
                    </strong>
                    <p><small>By Using prefixes , any routes inside the group will have the URL like this <strong>/before-something/something</strong> </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Route Prefixes  ----------------------------------------------->

        <!------------------------------------------------------ Fallback Routes  ----------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingten5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseTen5" aria-expanded="false" aria-controls="collapseTen5">
                        Route Prefixes
                    </a>
                </h4>
            </div>
            <div id="collapseTen5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingten5">
                <div class="panel-body">
                    <p>When you type in the wrong route , it will return the page with all the errors. You can easily hide it with <strong>Route::fallback</strong> method.</p>
                    <h5>Example</h5>
                    <strong>
                        <p>
                            Route::fallback(function () { <br>
                            Route::get('/something','YourController@YourAction');
                            }); <br>
                        </p>
                    </strong>
                    <p><small>By Using fallback , any routes inside this will automatically  return the <strong>404 page</strong> if found unhandled requests </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ Fallback Routes  ----------------------------------------------->
    </div>
</div>

@endsection