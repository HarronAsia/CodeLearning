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


    img {
        transition: transform 0.25s ease;
    }

    img:hover {
        -webkit-transform: scale(3.5);
        /* or some other value */
        transform: scale(3.5);

    }
</style>
<div class="col-lg-12 ">
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link" id="nav-requirement-tab" data-toggle="tab" href="#nav-requirement" role="tab" aria-controls="nav-requirement" aria-selected="false">Requirements</a>
            <a class="nav-item nav-link" id="nav-installing-tab" data-toggle="tab" href="#nav-installing" role="tab" aria-controls="nav-installing" aria-selected="false">Installing</a>
            <a class="nav-item nav-link" id="nav-configuration-tab" data-toggle="tab" href="#nav-configuration" role="tab" aria-controls="nav-configuration" aria-selected="false">Configuration</a>

        </div>
    </nav>
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-requirement" role="tabpanel" aria-labelledby="nav-requirement-tab">
            <ul class="list-group">
                <li class="list-group-item">PHP >= 7.2.5</li>
                <li class="list-group-item">BCMath PHP Extension</li>
                <li class="list-group-item">Ctype PHP Extension</li>
                <li class="list-group-item">Fileinfo PHP extension</li>
                <li class="list-group-item">JSON PHP Extension</li>
                <li class="list-group-item">Mbstring PHP Extension</li>
                <li class="list-group-item">OpenSSL PHP Extension</li>
                <li class="list-group-item">PDO PHP Extension</li>
                <li class="list-group-item">Tokenizer PHP Extension</li>
                <li class="list-group-item">XML PHP Extension</li>
            </ul>
        </div>
        <div class="tab-pane fade" id="nav-installing" role="tabpanel" aria-labelledby="nav-installing-tab">
            <div class="how-section1">
                <div class="row">
                    <div class="col-md-6 how-img">
                        <img src="{{asset('storage/Requirement/laravel_installer.jpg')}}" class="rounded-circle img-fluid" alt="" />
                    </div>
                    <div class="col-md-6">
                        <h4>Via Laravel Installer</h4>
                        <h4 class="subheading"><strong>First</strong>, download the Laravel installer using Composer:</h4>
                        <p class="text-muted">composer global require laravel/installer</p>
                        <h4 class="subheading"><strong>Then</strong>, just type:</h4>
                        <p class="text-muted">laravel new blog</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Via Composer Create-Project</h4>
                        <h4 class="subheading">Alternatively, you may also install Laravel by issuing the Composer <strong>create-project</strong> command in your terminal:</h4>
                        <p class="text-muted">composer create-project --prefer-dist laravel/laravel blog</p>
                        <h4 class="subheading"><strong>Then</strong>, just type:</h4>
                        <p class="text-muted">php artisan serve</p>
                    </div>
                    <div class="col-md-6 how-img">
                        <img src="{{asset('storage/Requirement/composer.png')}}" class="rounded-circle img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-configuration" role="tabpanel" aria-labelledby="nav-configuration-tab">
            <section class="our-blog p-0 m-0 bg-silver">
                <div class="container work-process  pb-5 pt-5">
                    <div class="title mb-5 text-center">
                        <h3>Configuration<span class="site-color"> Processes</span></h3>
                    </div>
                    <!-- ============ step 1 =========== -->
                    <div class="row">
                        <div class="col-md-5">
                            <div class="process-box process-left" data-aos="fade-right" data-aos-duration="1000">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="process-step">
                                            <p class="m-0 p-0">Step</p>
                                            <h2 class="m-0 p-0">01</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h5>Public Directory</h5>
                                        <p><small>Configure your web server's document / web root to be the public directory</small></p>

                                        <img src="{{asset('storage/Requirement/step1.PNG')}}" class="img-fluid" alt="image" />
                                        <div>
                                            <p><strong>Virtual Host: </strong> Define the port of your machine( in here is port 80)</p>
                                            <p><strong>Document Root: </strong> Define the path to your project</p>
                                            <p><strong>Server Name: </strong> Define the name of your application</p>
                                            <p><strong>Error Log(Optional): </strong> If you want to see the return error logs then add this</p>
                                            <p><strong>Transfer Log(Optional): </strong> If you want to see how the traffic inside your project work then add this</p>
                                            <p><strong>AddDefaultCharset: </strong> the default charset of HTML is UTF-8, so add this to run your project better</p>
                                            <p><strong>AllowEncodedSlashes : </strong> Add this to easily customize your URL</p>
                                            <p><strong>Directory : </strong> Document Root act as location of your project while Directory letting you specify Apache configuration rules to only apply to a specific directory</p>
                                            <p><strong>Option : Indexes -> </strong> If a URL which maps to a directory is requested, and there is no DirectoryIndex (e.g., index.html) in that directory, then mod_autoindex will return a formatted listing of the directory.</p>
                                            <p><strong>AllowOverride : </strong> AllowOverride directive is used to allow the use of .htaccess within the web server to allow overriding of the Apache config on a per directory basis</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <div class="process-point-right"></div>
                        </div>
                    </div>
                    <!-- ============ step 2 =========== -->
                    <div class="row">

                        <div class="col-md-5">
                            <div class="process-point-left"></div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <div class="process-box process-right" data-aos="fade-left" data-aos-duration="1000">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="process-step">
                                            <p class="m-0 p-0">Step</p>
                                            <h2 class="m-0 p-0">02</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h5>Configuration Files</h5>
                                        <p><small>All of the configuration files for the Laravel framework are stored in the <strong>config</strong> directory.</small></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- ============ step 3 =========== -->
                    <div class="row">
                        <div class="col-md-5">
                            <div class="process-box process-left" data-aos="fade-right" data-aos-duration="1000">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="process-step">
                                            <p class="m-0 p-0">Step</p>
                                            <h2 class="m-0 p-0">03</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h5>Directory Permissions</h5>
                                        <p><small>After installing Laravel, you may need to configure some permissions.</small></p>
                                        <h6>Storage: </h6>
                                        <p><small>chmod 775 -R your-project-path/storage</small></p>
                                        <h6>Bootstrap/Cache: </h6>
                                        <p><small>chmod 775 -R your-project-path/bootstrap/cache</small></p>
                                        <h6 style="color: red;">If Failed Only</h6>
                                        <p><small>Set everything 777 and try again . Then find what's the problem and fixed it then set back to 775</small></p>
                                        <h6 style="color: grey;">Meaning</h6>
                                        <p><small>777 or 775 means( From left to right): </small></p>
                                        <ul class="list-group">
                                            <li class="list-group-item">Readable-The other can only read the page</li>
                                            <li class="list-group-item">Writable-The other can do input but not affected to system</li>
                                            <li class="list-group-item">Executable- The other can act as an administration</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">

                        </div>
                    </div>
                    <!-- ============ step 4 =========== -->
                    <div class="row">
                        <div class="col-md-5">
                        
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <div class="process-box process-right" data-aos="fade-left" data-aos-duration="1000">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="process-step">
                                            <p class="m-0 p-0">Step</p>
                                            <h2 class="m-0 p-0">04</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h5>Application Key</h5>
                                        <p><small>The next thing you should do after installing Laravel is set your application key to a random string that 32 characters long.</small></p>
                                        <h6>Command: </h6>
                                        <p><small>php artisan key:generate</small></p>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                </div>
            </section>

        </div>
    </div>

</div>

@endsection