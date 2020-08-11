@extends('layouts.app')

@section('content')

<style>
    nav>.nav.nav-tabs {
        border: none;
        color: #fff;
        background: #272e38;
        border-radius: 0;
    }

    nav>div a.nav-item.nav-link,
    nav>div a.nav-item.nav-link.active {
        border: none;
        padding: 18px 25px;
        color: #fff;
        background: #272e38;
        border-radius: 0;
    }

    nav>div a.nav-item.nav-link.active:after {
        content: "";
        position: relative;
        bottom: -60px;
        left: -10%;
        border: 15px solid transparent;
        border-top-color: #e74c3c;
    }

    .tab-content {
        background: #fdfdfd;
        line-height: 25px;
        border: 1px solid #ddd;
        border-top: 5px solid #e74c3c;
        border-bottom: 5px solid #e74c3c;
        padding: 30px 25px;
    }

    nav>div a.nav-item.nav-link:hover,
    nav>div a.nav-item.nav-link:focus {
        border: none;
        background: #e74c3c;
        color: #fff;
        border-radius: 0;
        transition: background 0.20s linear;
    }

    .how-section1 {
        margin-top: -15%;
        padding: 10%;
    }

    .how-section1 h4 {
        color: #ffa500;
        font-weight: bold;
        font-size: 30px;
    }

    .how-section1 .subheading {
        color: #3931af;
        font-size: 20px;
    }

    .how-section1 .row {
        margin-top: 10%;
    }

    .how-img {
        text-align: center;
    }

    .how-img img {
        width: 60%;
    }

    .holderCircle {
        width: 500px;
        height: 500px;
        border-radius: 100%;
        margin: 60px auto;
        position: relative;
    }

    .process-box {
        background: #fff;
        padding: 10px;
        border-radius: 15px;
        position: relative;
        box-shadow: 2px 2px 7px 0 #00000057;
    }

    .process-left:after {
        content: "";
        border-top: 15px solid #ffffff;
        border-bottom: 15px solid #ffffff;
        border-left: 15px solid #ffffff;
        border-right: 15px solid #ffffff;
        display: inline-grid;
        position: absolute;
        right: -15px;
        top: 42%;
        transform: rotate(45deg);
        box-shadow: 3px -2px 3px 0px #00000036;
        z-index: 1;
    }

    .process-right:after {
        content: "";
        border-top: 15px solid #ffffff00;
        border-bottom: 15px solid #ffffff;
        border-left: 15px solid #ffffff;
        border-right: 15px solid #ffffff00;
        display: inline-grid;
        position: absolute;
        left: -15px;
        top: 42%;
        transform: rotate(45deg);
        box-shadow: -1px 1px 3px 0px #0000001a;
        z-index: 1;
    }

    .process-step {
        background: #00BCD4;
        text-align: center;
        width: 80%;
        margin: 0 auto;
        color: #fff;
        height: 100%;
        padding-top: 8px;
        position: relative;
        top: -26px;
        border-radius: 0px 0px 10px 10px;
        box-shadow: -6px 8px 0px 0px #00000014;
    }

    .process-point-right {
        background: #ffffff;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        border: 8px solid #00bcd4;
        box-shadow: 0 0 0px 4px #5c5c5c;
        margin: auto 0;
        position: absolute;
        bottom: 40px;
        left: -63px;
    }

    .process-point-right:before {
        content: "";
        height: 144px;
        width: 11px;
        background: #5c5c5c;
        display: inline-grid;
        transform: rotate(36deg);
        position: relative;
        left: -50px;
        top: -0px;
    }

    .process-point-left {
        background: #ffffff;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        border: 8px solid #00bcd4;
        box-shadow: 0 0 0px 4px #5c5c5c;
        margin: auto 0;
        position: absolute;
        bottom: 40px;
        right: -63px;
    }

    .process-point-left:before {
        content: "";
        height: 144px;
        width: 11px;
        background: #5c5c5c;
        display: inline-grid;
        transform: rotate(-38deg);
        position: relative;
        left: 50px;
        top: 0px;

    }

    .process-last:before {
        display: none;
    }

    .process-box p {
        z-index: 9;
    }

    .process-step p {
        font-size: 20px;
    }

    .process-step h2 {
        font-size: 39px;
    }

    .process-step:after {
        content: "";
        border-top: 8px solid #04889800;
        border-bottom: 8px solid #048898;
        border-left: 8px solid #04889800;
        border-right: 8px solid #048898;
        display: inline-grid;
        position: absolute;
        left: -16px;
        top: 0;
    }

    .process-step:before {
        content: "";
        border-top: 8px solid #ff000000;
        border-bottom: 8px solid #048898;
        border-left: 8px solid #048898;
        border-right: 8px solid #ff000000;
        display: inline-grid;
        position: absolute;
        right: -16px;
        top: 0;
    }

    .process-line-l {
        background: white;
        height: 4px;
        position: absolute;
        width: 136px;
        right: -153px;
        top: 64px;
        z-index: 9;
    }

    .process-line-r {
        background: white;
        height: 4px;
        position: absolute;
        width: 136px;
        left: -153px;
        top: 63px;
        z-index: 9;
    }

    .img-fluid {
        width: 70%;
        height: auto;
    }

    .img-fluid2 {
        width: 40%;
        height: auto;
    }

    .section .row {
        margin-top: 7%;
        margin-bottom: 10%;
    }

    .section .row .col-md-6 {
        background: #f5f5f5;
        margin-right: -2%;
        padding: 5%;
    }

    .section h3 {
        color: #004085;
    }

    .section p {
        margin-top: 10%;
        color: #545b62;
    }

    .section img {
        width: 100%;
    }
</style>
<div class="col-lg-12 ">
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link" id="nav-introduction-tab" data-toggle="tab" href="#nav-introduction" role="tab" aria-controls="nav-introduction" aria-selected="false">{{__('Introduction')}}</a>
            <a class="nav-item nav-link" id="nav-basic-tab" data-toggle="tab" href="#nav-basic" role="tab" aria-controls="nav-basic" aria-selected="false">{{__('Basic Controllers')}}</a>
            <a class="nav-item nav-link" id="nav-middleware-tab" data-toggle="tab" href="#nav-middleware" role="tab" aria-controls="nav-middleware" aria-selected="false">{{__('Controller Middleware')}}</a>
            <a class="nav-item nav-link" id="nav-resource-tab" data-toggle="tab" href="#nav-resource" role="tab" aria-controls="nav-resource" aria-selected="false">{{__('Resource Controllers')}}</a>
            <a class="nav-item nav-link" id="nav-injection-tab" data-toggle="tab" href="#nav-injection" role="tab" aria-controls="nav-injection" aria-selected="false">{{__('Dependency Injection & Controllers')}}</a>
            <a class="nav-item nav-link" id="nav-caching-tab" data-toggle="tab" href="#nav-caching" role="tab" aria-controls="nav-caching" aria-selected="false">{{__('Route Caching')}}</a>
        </div>
    </nav>
    <!------------------------------------------------------------- Introduction -------------------------------------------------------->
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-introduction" role="tabpanel" aria-labelledby="nav-introduction-tab">
            <p class="text-muted">&ensp;{{__('In the MVC framework, the letter ‘C’ stands for Controller. It acts as a directing traffic between Views and Models.')}}</p>
            <p class="text-muted">&ensp;{{__('Controllers can group related request handling logic into a single class instead of defining all of your request handling logic in route')}}</p>
            <h4>{{__('Create a new Controller is super easy!')}}</h4>
            <img src="{{asset('storage/Requirement/makeController.PNG')}}" class="img-fluid" alt="" />
            <p class="text-muted">&ensp;<strong>php artisan make:controller YourController</strong></p>
            <p><small>{{__('After ran this command, inside the')}} <strong>App\Http\Controllers\</strong>. {{__('the YourController will be stored inside this path.')}} </small></p>
        </div>
        <!------------------------------------------------------------- Introduction -------------------------------------------------------->

        <!------------------------------------------------------------- Basic Controllers -------------------------------------------------------->
        <div class="tab-pane fade" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab">
            <div class="container section">
                <div class="row">
                    <div class="col-md-6">
                        <h3>
                            {{__('Defining Controllers')}}
                        </h3>
                        <p>
                            {{__('There are many ways you can define the variable and attach it to your page.In this example , i will only show you 3 type of commons ways to define the controller')}}
                        </p>
                        <h4>{{__('Put inside the View')}}</h4>

                        <p><strong> return view('{{__('Some where')}}.{{__('some where')}}', ['{{__('Your Variable')}}' => {{__('Your Model')}}::{{__('Your Querry')}}({{__('Thing You Want To Find')}})]);</strong></p>
                        <p><small>{{__('The command above can be explained by this:')}}</small></p>
                        <small>
                            <ul>
                                <li>
                                   {{__('$view is the Blade you want it to return . For Example: Welcome.blade.php so the $view will be')}} <strong>return view('Welcome');</strong>
                                </li>
                                <li>
                                    {{__('Your Querry is the MYSQL command such as (findOrFail, get,all,select from where)')}} <br>
                                    {{__('$data is the variables you want it to have inside the view. For Example: We will imply the name of something inside the view so the command will be')}} <br>
                                    <strong>return view('Welcome',['{{__('Name Of Something')}}' =>{{__('Your Model')}}::{{__('Your Querry')}}]);</strong>
                                </li>
                                <li>
                                    {{__('$mergeData is the join 2 table together, by Defaul this will be NULL.')}}
                                </li>
                            </ul>
                        </small>

                        <h4>{{__('Using Compact')}}</h4>
                        <p><strong> return view('{{__('Some where')}}.{{__('some where')}}', compact('{{__('Your Variable')}}'));</strong></p>
                        <p>{{__('Compact is a PHP function that allows you create an array with variable names and their values.')}} <small>{{__('The command above can be explained by this:')}}</small> </p>
                        <h5>{{__('Right Way to use:')}}</h5>
                        <div class="row">
                            <div class="col">
                                <i class="fas fa-times-circle" style="color: red;"></i>
                                return view('{{__('Some where')}}.{{__('some where')}}', compact('{{__('Your Variable')}}'));

                            </div>
                            <div class="col">
                                <i class="fas fa-check-circle" style="color: green;"></i>
                                ${{__('YourVariable')}} = {{__('Your Model')}}::findOrFail($id);
                                return view('{{__('Some where')}}.{{__('some where')}}', compact('{{__('Your Variable')}}'));

                            </div>
                        </div>
                        <p style="color: red;">{{__('If you using compact, remember to do any logic like find something before using this.')}}</p>

                        <h4>{{__('Using With')}}</h4>
                        <p><strong> return view('{{__('Some where')}}.{{__('some where')}}')->with('{{__('Your Variable')}}',{{__('Your Model')}}::{{__('Your Querry')}}({{__('Thing You Want To Find')}}));</strong></p>
                        <p>{{__('It basicially the same as Using View')}}</p>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('storage/Requirement/DefineController.PNG')}}" class="img-fluid" alt="" />
                        <p style="color: grey;"><small>{{__('You can easily define the controller like the image above')}}</small></p>
                        <img src="{{asset('storage/Requirement/DefineControllerInRoute.PNG')}}" class="img-fluid" alt="" />
                        <p style="color: grey;"><small>{{__('You can easily define the controller in route like the image above')}}</small></p>
                        <img src="{{asset('storage/Requirement/UsingView.PNG')}}" class="img-fluid2" alt="" />
                        <p style="color: grey;"><small>{{__('You can easily using the view like the image above')}}</small></p>

                        <img src="{{asset('storage/Requirement/UsingCompact.PNG')}}" class="img-fluid2" alt="" />
                        <p style="color: grey;"><small>{{__('You can easily using the compact like the image above')}}</small></p>
                        <img src="{{asset('storage/Requirement/UsingWith.PNG')}}" class="img-fluid2" alt="" />
                        <p style="color: grey;"><small>{{__('You can easily using the with like the image above')}}</small></p>


                    </div>
                </div>

            </div>
        </div>
        <!------------------------------------------------------------- Basic Controllers -------------------------------------------------------->

        <!------------------------------------------------------------- Middleware Controllers -------------------------------------------------------->
        <div class="tab-pane fade" id="nav-middleware" role="tabpanel" aria-labelledby="nav-middleware-tab">
            <div class="container section">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('storage/Requirement/use-middleware.PNG')}}" class="img-fluid" alt="" />
                        <p style="color: grey;"><small>{{__('Middleware may be assigned to the controllers routes in your route')}}</small></p>
                        <h4>{{__('Example')}}</h4>
                        <img src="{{asset('storage/Requirement/MiddlewareController.PNG')}}" class="img-fluid" alt="" />
                        <p style="color: grey;"><small> {{__('You can use this to make every functions , which inside the route, to go through this middleware')}}</small></p>
                    </div>
                    <div class="col-md-6">
                        <h3>
                            {{__('Controller Middleware')}}
                        </h3>
                        <p>
                            {{__('However, its more convenient to specify middleware within your controllers constructor. By create a')}} <strong>public function __construct(){}</strong> {{__('above the controller.')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------- Middleware Controllers -------------------------------------------------------->

        <!------------------------------------------------------------- Resource Controllers -------------------------------------------------------->
        <div class="tab-pane fade" id="nav-resource" role="tabpanel" aria-labelledby="nav-resource-tab">
            <div class="container section">
                <div class="row">
                    <div class="col-md-6">
                        <h3>{{__('Resource Controllers')}}</h3>
                        <p>
                            {{__('Laravel resource routing assigns the typical CRUD routes to a controller with a single line of code.Basicially it will store any functions that will requests HTTP.')}}
                            <h4>{{__('Command')}}</h4>
                            <strong>php artisan make:controller YourController --resource</strong> <br>
                            <small>{{__('This command will create a YourController with all the functions such as:')}}</small>
                            <ul>
                                <li>{{__('index')}}</li>
                                <li>{{__('create')}}</li>
                                <li>{{__('store')}}</li>
                                <li>{{__('show')}}</li>
                                <li>{{__('edit')}}</li>
                                <li>{{__('update')}}</li>
                                <li>{{__('delete')}}</li>
                            </ul>
                            <h4>{{__('MInizing the Route')}}</h4>
                            <img src="{{asset('storage/Requirement/route-resource.PNG')}}" class="img-fluid" alt="" />
                            <small>{{__('This command will automatically group all of those functions above and modified like this table:')}}</small>
                        </p>

                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">{{__('Verb')}}</th>
                                    <th scope="col">{{__('URI')}}</th>
                                    <th scope="col">{{__('Action')}}</th>
                                    <th scope="col">{{__('Route Name')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>GET</td>
                                    <td><code class=" language-php"><span class="token operator">/</span>{{__('somethings')}}</code></td>
                                    <td>index</td>
                                    <td>{{__('somethings')}}.index</td>
                                </tr>
                                <tr>
                                    <td>GET</td>
                                    <td><code class=" language-php"><span class="token operator">/</span>{{__('somethings')}}<span class="token operator">/</span>create</code></td>
                                    <td>create</td>
                                    <td>{{__('somethings')}}.create</td>
                                </tr>
                                <tr>
                                    <td>POST</td>
                                    <td><code class=" language-php"><span class="token operator">/</span>{{__('somethings')}}</code></td>
                                    <td>store</td>
                                    <td>{{__('somethings')}}.store</td>
                                </tr>
                                <tr>
                                    <td>GET</td>
                                    <td><code class=" language-php"><span class="token operator">/</span>{{__('somethings')}}<span class="token operator">/</span><span class="token punctuation">{</span>something<span class="token punctuation">}</span></code></td>
                                    <td>show</td>
                                    <td>{{__('somethings')}}.show</td>
                                </tr>
                                <tr>
                                    <td>GET</td>
                                    <td><code class=" language-php"><span class="token operator">/</span>{{__('somethings')}}<span class="token operator">/</span><span class="token punctuation">{</span>something<span class="token punctuation">}</span><span class="token operator">/</span>edit</code></td>
                                    <td>edit</td>
                                    <td>{{__('somethings')}}.edit</td>
                                </tr>
                                <tr>
                                    <td>PUT/PATCH</td>
                                    <td><code class=" language-php"><span class="token operator">/</span>{{__('somethings')}}<span class="token operator">/</span><span class="token punctuation">{</span>something<span class="token punctuation">}</span></code></td>
                                    <td>update</td>
                                    <td>{{__('somethings')}}.update</td>
                                </tr>
                                <tr>
                                    <td>DELETE</td>
                                    <td><code class=" language-php"><span class="token operator">/</span>{{__('somethings')}}<span class="token operator">/</span><span class="token punctuation">{</span>something<span class="token punctuation">}</span></code></td>
                                    <td>destroy</td>
                                    <td>{{__('somethings')}}.destroy</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------- Resource Controllers -------------------------------------------------------->

        <!------------------------------------------------------------- Injection Controllers -------------------------------------------------------->
        <div class="tab-pane fade" id="nav-injection" role="tabpanel" aria-labelledby="nav-injection-tab">
            <div class="container section">
                <div class="row">
                    <div>
                        <h3>
                            {{__('Injection')}}
                        </h3>
                        <p>{{__('In Route, when we use dynamic parameter like {something}. We can easily get that parameter and inject into the Controller like this:')}}</p>
                    </div>
                    <div>
                        <img src="{{asset('storage/Requirement/injection.PNG')}}" class="img-fluid" alt="" />
                        <small>{{__('The last function which using')}} <strong>{{__('Request')}}</strong> {{__('will extract all of the request that currently happenning inside the page.')}} </small>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------- Injection Controllers -------------------------------------------------------->

        <!------------------------------------------------------------- Route Caching Controllers -------------------------------------------------------->
        <div class="tab-pane fade" id="nav-caching" role="tabpanel" aria-labelledby="nav-caching-tab">
            <div class="container section">
                <div class="row">
                    <div>
                        <h3>
                            {{__('Route Caching')}}
                        </h3>
                        <p>{{__('If your application is exclusively using controller based routes, you should take advantage of Laravels route cache.It will drastically decrease the amount of time it takes to register all of your applications routes and boost your route registration to 100x faster.')}} <br>
                            <strong style="color: red;">{{__('But if you are using Laravel framework then you need to modify a little bit before running the command below')}}</strong> <br>
                            {{__('First , go to')}} <strong>route/api.php</strong> <br>
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset('storage/Requirement/originial_api.PNG')}}" class="img-fluid2" alt="" />
                                </div>
                                <i class="fa fa-arrow-right"></i>
                                <div class="col">
                                    <img src="{{asset('storage/Requirement/modified-api.PNG')}}" class="img-fluid2" alt="" />
                                </div>
                            </div>
                            {{__('Then go to')}} <strong>App\Http\Controllers\UserController</strong> {{__('to add this function into it.')}} <br>
                            <img src="{{asset('storage/Requirement/User-Api.PNG')}}" class="img-fluid2" alt="" />
                            <strong style="color: grey;">{{__('If you dont have UserController then dont worry, just run')}} <b> php artisan make:controller UserController</b></strong>
                        </p>
                    </div>
                    <div>
                        <p>{{__('The reason why we need to modified before run this Command is because its happened to be a minor bugs from Laravel when they try to get the user from nothing so the function will return error cant seriliaztion')}}</p>
                        <h4>{{__('Command')}}</h4>
                        <p> <strong>php artisan route:cache</strong></p>
                    </div>

                    <img src="{{asset('storage/Requirement/route-cache.PNG')}}" class="img-fluid" alt="" />
                    <p><small>{{__('If use feel slow in the route registration, run this command to clear all the route cache.')}} <strong>php artisan route:clear</strong>  </small></p>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------- Route Caching Controllers -------------------------------------------------------->
    </div>

</div>

@endsection