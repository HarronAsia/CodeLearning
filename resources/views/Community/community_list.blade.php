@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f1f1f2 !important;
    }

    h3.h3 {
        text-align: center;
        padding: 1.5em 0em;
        text-transform: capitalize;
        font-size: 1.5em;
    }

    /******************  News Slider Demo-4 *******************/
    .post-slide4 {
        margin: 0 10px;
        background: #fff;
        box-shadow: 0 1px 2px rgba(43, 59, 93, 0.30);
        margin-bottom: 2em;
    }

    .post-slide4 .post-info {
        padding: 5px 10px;
        margin: 0;
        list-style: none;
    }

    .post-slide4 .post-info li {
        display: inline-block;
        margin: 0 5px;
    }

    .post-slide4 .post-info li i {
        margin-right: 8px;
    }

    .post-slide4 .post-info li a {
        font-size: 11px;
        font-weight: bold;
        color: #7e828a;
        text-transform: uppercase;
    }

    .post-slide4 .post-info li a:hover {
        color: #1dcfd1;
        text-decoration: none;
    }

    .post-slide4 .post-img {
        position: relative;
    }

    .post-slide4 .post-img:before {
        content: "";
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        background: rgba(0, 0, 0, 0.6);
        transition: opacity 0.40s linear 0s;
    }

    .post-slide4:hover .post-img:before {
        opacity: 1;
    }

    .post-slide4 .post-img img {
        width: 100%;
        height: auto;
    }

    .post-slide4 .read {
        position: absolute;
        bottom: 30px;
        left: 50px;
        font-size: 14px;
        color: #fff;
        text-transform: capitalize;
        opacity: 0;
        transition: all 0.40s linear 0s;
    }

    .post-slide4:hover .read {
        opacity: 1;
    }

    .post-slide4 .read:hover {
        text-decoration: none;
        color: #1dcfd1;
    }

    .post-slide4 .post-content {
        padding: 40px 15px;
        position: relative;
    }

    .post-slide4 .post-author {
        width: 75px;
        height: 75px;
        border-radius: 50%;
        position: absolute;
        top: -45px;
        right: 10px;
        overflow: hidden;
        border: 4px solid #fff;
    }

    .post-slide4 .post-author img {
        width: 100%;
        height: auto;
    }

    .post-slide4 .post-title {
        font-size: 14px;
        font-weight: bold;
        color: #1dcfd1;
        margin: 0 0 10px 0;
        text-transform: uppercase;
        transition: all 0.30s linear 0s;
    }

    .post-slide4 .post-title:after {
        content: "";
        width: 25px;
        display: block;
        margin-top: 10px;
        border-bottom: 4px solid #333;
    }

    .post-slide4 .post-description {
        font-size: 13px;
        color: #555;
        margin-bottom: 20px;
    }

    /******************  News Slider Demo-4 *******************/

    .basic-padding {
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .image-hover {
        background: -webkit-linear-gradient(45deg, #ff89e9 0, #05abe0 100%);
        background: linear-gradient(45deg, #ff89e9 0, #05abe0 100%);
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .image-hover .overlay {
        width: 60%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;

    }

    .image-hover .overlay::before {
        content: '';
        -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
        position: absolute;
        top: 20px;
        right: 20px;
        bottom: 20px;
        left: 20px;
        border: 1px solid #fff;
        opacity: 0;
        transition: opacity .35s, transform .45s;
        -webkit-transform: translate3d(-20px, 0, 0);
        transform: translate3d(-20px, 0, 0);
    }

    .image-hover img {
        -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;

        transition: opacity .35s, transform .45s;
        -webkit-transform: translate3d(-40px, 0, 0);
        transform: translate3d(-40px, 0, 0);
    }

    .image-hover h2 {
        padding: 15% 0 10px;
        color: #fff;
        position: relative;
        font-size: 17px;
        text-transform: uppercase;
    }

    .image-hover .btn-hover {
        display: inline-block;
        color: #fff;
        opacity: 0;
        margin: 0;
        padding: 0;
        border: none;
        -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
        transition: opacity .35s, transform .45s;
        -webkit-transform: translate3d(-10px, 0, 0);
        transform: translate3d(-10px, 0, 0);
    }

    .image-hover:hover img {
        opacity: .6;
        -webkit-transform: translate3d(0px, 0, 0);
        transform: translate3d(0px, 0, 0);
    }

    .image-hover:hover .overlay::before {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .image-hover:hover .btn-hover {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
</style>
<div>
    <a href="{{route('community.create', app()->getLocale())}}" class="btn btn-info">Add Community</a>
</div>
<div class="container">
    <h3 class="h3">Latest News Post</h3>
    <div class="row">
        <div class="col-md-12">
            <div id="news-slider4" class="owl-carousel">
                <div class="post-slide4">
                    <ul class="post-info">
                        <li><i class="fa fa-tag"></i><a href="#">java</a></li>
                        <li><i class="fa fa-calendar"></i><a href="#">June 10, 2016</a></li>
                        <li><i class="fa fa-comment"></i><a href="#">1</a></li>
                    </ul>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-1.jpg" alt="">
                        <a href="#" class="read">read more</a>
                    </div>
                    <div class="post-content">
                        <span class="post-author">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-5.jpg" alt=""></a>
                        </span>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ducimus est, excepturi nam odit possimus? Accusantium, aut beatae commodi dolore dolores esse fugit id illum ipsam nemo nesciunt obcaecati officiis praesentium provident quasi quis quo repellat sapiente sequi temporibus voluptates.</p>
                    </div>
                </div>

                <div class="post-slide4">
                    <ul class="post-info">
                        <li><i class="fa fa-tag"></i><a href="#">java</a>,<a href="#">php</a></li>
                        <li><i class="fa fa-calendar"></i><a href="#">June 12, 2016</a></li>
                        <li><i class="fa fa-comment"></i><a href="#">3</a></li>
                    </ul>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-2.jpg" alt="">
                        <a href="#" class="read">read more</a>
                    </div>
                    <div class="post-content">
                        <span class="post-author">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-6.jpg" alt=""></a>
                        </span>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ducimus est, excepturi nam odit possimus? Accusantium, aut beatae commodi dolore dolores esse fugit id illum ipsam nemo nesciunt obcaecati officiis praesentium provident quasi quis quo repellat sapiente sequi temporibus voluptates.</p>
                    </div>
                </div>

                <div class="post-slide4">
                    <ul class="post-info">
                        <li><i class="fa fa-tag"></i><a href="#">java</a>,<a href="#">php</a></li>
                        <li><i class="fa fa-calendar"></i><a href="#">June 12, 2016</a></li>
                        <li><i class="fa fa-comment"></i><a href="#">3</a></li>
                    </ul>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-3.jpg" alt="">
                        <a href="#" class="read">read more</a>
                    </div>
                    <div class="post-content">
                        <span class="post-author">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-7.jpg" alt=""></a>
                        </span>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ducimus est, excepturi nam odit possimus? Accusantium, aut beatae commodi dolore dolores esse fugit id illum ipsam nemo nesciunt obcaecati officiis praesentium provident quasi quis quo repellat sapiente sequi temporibus voluptates.</p>
                    </div>
                </div>

                <div class="post-slide4">
                    <ul class="post-info">
                        <li><i class="fa fa-tag"></i><a href="#">java</a>,<a href="#">php</a></li>
                        <li><i class="fa fa-calendar"></i><a href="#">June 12, 2016</a></li>
                        <li><i class="fa fa-comment"></i><a href="#">3</a></li>
                    </ul>
                    <div class="post-img">
                        <img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-4.jpg" alt="">
                        <a href="#" class="read">read more</a>
                    </div>
                    <div class="post-content">
                        <span class="post-author">
                            <a href="#"><img src="http://bestjquery.com/tutorial/news-slider/demo31/images/img-7.jpg" alt=""></a>
                        </span>
                        <h3 class="post-title">Latest News Post</h3>
                        <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore ducimus est, excepturi nam odit possimus? Accusantium, aut beatae commodi dolore dolores esse fugit id illum ipsam nemo nesciunt obcaecati officiis praesentium provident quasi quis quo repellat sapiente sequi temporibus voluptates.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <h3>All Communities</h3>
    <div class="row">
        @foreach($communities as $community)



        
        @if($community->deleted_at == NULL)
        <div class="col-md-6">
            @else
            <div class="col-md-6" style="opacity: 0.2;">
                @endif
                <div class="basic-padding">
                    <div class="image-hover">

                        <img src="{{asset('storage/community/'.$community->title.'/'.$community->banner.'/')}}" class="img-responsive" style="width: 300px; height:300px;">
                        <div class="overlay">
                            <h2>{{ucfirst($community->title)}}</h2>
                            @if($community->deleted_at == NULL)
                            <a href="{{route('community.show',['community'=>$community->id,'locale'=>app()->getLocale()])}}" class="btn-hover">
                                <i class="far fa-eye" style="font-size:25px; color:white;"></i>
                            </a>
                            <a href="{{route('community.edit',['community'=>$community->id,'locale'=>app()->getLocale()])}}" class="btn-hover">
                                <i class="fas fa-edit" style="font-size:25px; color:blue;"></i>
                            </a>

                            <form action="{{route('community.destroy',['community'=>$community->id,'locale'=>app()->getLocale() ])}}" method="POST" class="btn-hover">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <i class="fas fa-trash" style="font-size:25px; color:red;"></i>
                                </button>
                            </form>

                            @else
                            <a href="{{route('community.restore',['community'=>$community->id,'locale'=>app()->getLocale()])}}" onClick="$(this).closest('a').fadeOut(800);" class="btn-hover">
                                <i class="fas fa-trash-restore" style="font-size:25px; color:blue; "></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
    @endsection