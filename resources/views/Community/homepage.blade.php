@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #eeeeee;
    }

    .h7 {
        font-size: 0.8rem;
    }

    .gedf-wrapper {
        margin-top: 0.97rem;
    }

    @media (min-width: 992px) {
        .gedf-main {
            padding-left: 4rem;
            padding-right: 4rem;
        }

        .gedf-card {
            margin-bottom: 2.77rem;
        }
    }

    /**Reset Bootstrap*/
    .dropdown-toggle::after {
        content: none;
    }

    textarea {
        resize: none !important;
    }

    img {
        width: 100%;
        height: auto;
    }

    .widget-area.blank {
        background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
    }

    body .no-padding {
        padding: 0;
    }

    .widget-area {
        background-color: #fff;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
        -ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
        -o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
        box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
        float: left;
        margin-top: 30px;
        padding: 25px 30px;
        position: relative;
        width: 100%;
    }

    .status-upload {
        background: none repeat scroll 0 0 #f5f5f5;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        float: left;
        width: 100%;
    }

    .status-upload form {
        float: left;
        width: 100%;
    }

    .status-upload form textarea {
        background: none repeat scroll 0 0 #fff;
        border: medium none;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        -ms-border-radius: 4px 4px 0 0;
        -o-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
        color: #777777;
        float: left;
        font-family: Lato;
        font-size: 14px;
        height: 142px;
        letter-spacing: 0.3px;
        padding: 20px;
        width: 100%;
        resize: vertical;
        outline: none;
        border: 1px solid #F2F2F2;
    }

    .status-upload ul {
        float: left;
        list-style: none outside none;
        margin: 0;
        padding: 0 0 0 15px;
        width: auto;
    }

    .status-upload ul>li {
        float: left;
    }

    .status-upload ul>li>a {
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        color: #777777;
        float: left;
        font-size: 14px;
        height: 30px;
        line-height: 30px;
        margin: 10px 0 10px 10px;
        text-align: center;
        -webkit-transition: all 0.4s ease 0s;
        -moz-transition: all 0.4s ease 0s;
        -ms-transition: all 0.4s ease 0s;
        -o-transition: all 0.4s ease 0s;
        transition: all 0.4s ease 0s;
        width: 30px;
        cursor: pointer;
    }

    .status-upload ul>li>a:hover {
        background: none repeat scroll 0 0 #606060;
        color: #fff;
    }

    .status-upload form button {
        border: medium none;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        color: #fff;
        float: right;
        font-family: Lato;
        font-size: 14px;
        letter-spacing: 0.3px;
        margin-right: 9px;
        margin-top: 9px;
        padding: 6px 15px;
    }

    .dropdown>a>span.green:before {
        border-left-color: #2dcb73;
    }

    .status-upload form button>i {
        margin-right: 7px;
    }

    .comments-section {
        background: #fff;
    }

    .comment-area {
        background: none repeat scroll 0 0 #fff;
        border: medium none;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        -ms-border-radius: 4px 4px 0 0;
        -o-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
        color: #777777;
        float: left;
        font-family: Lato;
        font-size: 14px;
        letter-spacing: 0.3px;
        padding: 10px 20px;
        width: 100%;
        resize: vertical;
        outline: none;
        border: 1px solid #F2F2F2;
    }

    .camera {
        height: 100%;
        border: none;
        font-size: 15px;
        background-color: #338EB5;
        color: white;

    }

    .comment-btn {
        float: right;
        background: #338EB5;
        padding: 6px 15px;
        color: #fff;
        letter-spacing: 1.5px;
        outline: none;
        border-radius: 4px;
        box-shadow: none;
    }

    .comment-btn:hover,
    .comment-btn:focus {
        background: #29ABE2;
        outline: none;
        border-radius: 4px;
        box-shadow: none;
    }

    .comment-box-wrapper {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin: 5px 0px;
    }

    .comment-box {
        display: flex;
        width: 100%;
    }

    .comment-box a {
        color: #242475;
    }

    .commenter-image {
        height: 40px;
        width: 40px;
        border-radius: 50%;
    }

    .comment-content {
        display: flex;
        flex-direction: column;
        background: #f2f3f5;
        margin-left: 5px;
        padding: 4px 20px;
        border-radius: 10px;
    }

    .commenter-head {
        display: block;
    }


    .commenter-head .commenter-name {
        font-size: 0.9rem;
        font-weight: 600;
    }




    .comment-date {
        font-size: 0.7rem;
    }

    .comment-date i {
        margin: 0 5px 0 10px;
    }

    .comment-body {
        padding: 0 0 0 5px;
        display: flex;
        font-size: 1rem;
        font-size: 0.8rem;
        font-weight: 400;
    }

    .comment-footer {
        font-size: 0.8rem;
        font-weight: 600;
    }

    .comment-footer span {
        margin: 0 15px 0 0;
    }

    .comment-footer span a {
        margin: 0 0px 0 2px;
    }


    .comment-footer span.comment-likes .active .fa-heart {
        color: black;
        font-size: 1rem;
    }

    .comment-footer span.comment-likes .active .fa-heart {
        color: red;
    }

    .nested-comments {
        margin-left: 50px;
    }

    #upload-photo {
        opacity: 0;
        position: absolute;
        z-index: -1;
    }
</style>
<div class="container-fluid gedf-wrapper">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="h5">{{ucfirst($community->title)}}</div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="h6 text-muted">Followers</div>
                        <div class="h5">5.2342</div>
                    </li>
                    <li class="list-group-item">
                        <div class="h6 text-muted">Following</div>
                        <div class="h5">6758</div>
                    </li>
                    @guest
                    <li class="list-group-item">
                        <a href="/login" class="btn btn-info">Get Notification</a>
                    </li>
                    @else
                    <li class="list-group-item">
                        <a href="#" class="btn btn-info">Get Notification</a>
                    </li>
                    @endif
                </ul>
            </div>

            <div>

            </div>
        </div>

        <div class="col-md-6 gedf-main">
            @guest

            @else
            <!--- \\\\\\\Insert Post-->
            <div class="card gedf-card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
                                a publication</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="image" aria-selected="false" href="#image">Images</a>
                        </li>
                    </ul>
                </div>
                <form action="{{route('post.store', [app()->getLocale()])}}" id="PostCreate" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id??''}}">
                                <input type="hidden" name="community_id" value="{{$community->id}}">
                                <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label class=" sr-only" for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="What is the Topic?" />
                                </div>

                                <div class="form-group has-feedback{{ $errors->has('detail') ? ' has-error' : '' }}">
                                    <label class=" sr-only" for="detail">Detail</label>
                                    <textarea class="form-control" id="detail" name="detail" rows="3" placeholder="What are you thinking?"></textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group has-feedback{{ $errors->has('image') ? ' has-error' : '' }}">

                                    <div class="custom-file">
                                        <label class="custom-file-label" for="image">Upload image</label>
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                    </div>
                                </div>

                                <div class="py-4"> <img id="image_preview_container" src="{{asset('storage/blank.png')}}" alt="preview Banner" style="max-width:400px ; max-height:400px;"></div>
                            </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" name="post_form" class="btn btn-primary">share</button>
                            </div>
                            <div class="btn-group">

                            </div>
                            <div class="btn-group has-feedback{{ $errors->has('status') ? ' has-error' : '' }}">

                                <select class="form-control" name="status" id="status">
                                    <option value="Public">Public</option>
                                    <option value="Friends">Friends</option>
                                    <option value="Private">Private</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                    @endif
                </form>
            </div>
            <!-- Post Insert/////-->
            @endif
            @foreach($posts as $post)
            @if($post->deleted_at == NULL)
            <!--- \\\\\\\Post-->
            <div class="card gedf-card">
                @else
                <div class="card gedf-card" style="opacity: 0.3;">
                    @endif
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    @if ($post->user->photo == NULL)
                                    <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="" style="max-width: 100px;" />
                                    @else
                                    <img class="rounded-circle" src="{{asset('storage/'.$post->user->name.'/'.$post->user->photo)}}" style="max-width: 100px;">
                                    @endif
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">{{ucfirst($post->user->name)}}</div>
                                    <div class="h7 text-muted">{{ucfirst($post->user->profile->job??'')}}</div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Configuration</div>
                                        @if($post->deleted_at == NULL)
                                        <a class="dropdown-item" href="{{route('post.edit',[app()->getLocale(),'post'=>$post->id])}}">
                                            <i class="fas fa-edit" style="font-size:25px; color:blue;"></i> Edit
                                        </a>
                                        <a class="dropdown-item">
                                            <form action="{{route('post.destroy',[app()->getLocale(),'post'=>$post->id] )}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn">
                                                    <i class="fas fa-trash" style="font-size:25px; color:red;"></i> Delete
                                                </button>
                                            </form>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-trash" style="font-size:25px; color:grey;"></i>Report
                                        </a>
                                        @else
                                        <a class="dropdown-item" href="{{route('post.restore',[app()->getLocale(),'post'=>$post->id])}}">
                                            <i class="fas fa-trash-restore" style="font-size:25px; color:blue; "></i> Restore
                                        </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> {{$post->created_at}}</div>
                        <a class="card-link" href="#">
                            <h5 class="card-title"> {{$post->title}}</h5>
                        </a>

                        <p class="card-text">
                            {{$post->detail}}
                        </p>
                        <div>
                            <span class="badge badge-primary">JavaScript</span>
                            <span class="badge badge-primary">Android</span>
                            <span class="badge badge-primary">PHP</span>
                            <span class="badge badge-primary">Node.js</span>
                            <span class="badge badge-primary">Ruby</span>
                            <span class="badge badge-primary">Paython</span>
                        </div>
                        <br>
                        @if($post->image == NULL)

                        @else
                        <div>
                            <img src="{{asset('storage/post/'.$post->title.'/'.$post->image)}}" alt="image">
                        </div>
                        @endif
                    </div>
                    <div class="card-footer">

                        @if($post->like->user_id??'' == Auth::user()->id)
                        <a href="{{route('post.unlike',[app()->getLocale(),'post' => $post->id])}}" class="card-link"><i class="fas fa-thumbs-up"></i></i> Like&ensp;{{$post->likes->count()}}</a>
                        @else
                        <a href="{{route('post.like',[app()->getLocale(),'post' => $post->id])}}" class="card-link"><i class="far fa-thumbs-up"></i> Like&ensp;{{$post->likes->count()}}</a>
                        @endif
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>

                        @guest

                        @else
                        <!--====COMMENT AREA START====-->
                        <div class="row" style="padding-top: 10px;">
                            <div class="col-12">

                                <form action="{{route('comment.store',[app()->getLocale(),'post'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                    <div class="input-group ">
                                        <span class="input-group-addon ">
                                            <label class="btn btn-file camera ">
                                                <i class="fa fa-camera" style="margin-top:10px; color:white;"></i>
                                                <input class="form-control " type="file" name="comment_image" style="display: none;" />
                                            </label>

                                        </span>
                                        <input class="form-control" name="comment_detail" placeholder="Write your comment here" required>
                                        <span class="input-group-addon ">
                                            <button type="submit" class="btn  comment-btn " style="height: 100%;">
                                                <i class="fas fa-paper-plane"></i>
                                            </button>
                                        </span>
                                    </div>

                                </form>
                            </div>
                        </div>
                        @endif
                        <hr>
                        <!-- =======COMMENTS START=======-->
                        <div class="row" style="padding-top: 25px;">
                            @foreach($post->comments as $comment)
                            <div class="col-8">

                                <div class="comment-box-wrapper">
                                    <div class="comment-box">

                                        @if ($post->user->photo == NULL)
                                        <div>

                                        </div>
                                        @else
                                        <img src="{{asset('storage/'.$comment->user->name.'/'.$comment->user->photo)}}" alt="Image" class="commenter-image" alt="commenter_image" width="45">
                                        @endif
                                        <div class="comment-content">
                                            <div class="commenter-head"><span class="commenter-name"><a href="">{{ucfirst($comment->user->name)}}</a></span> <span class="comment-date"><i class="far fa-clock"></i>{{$comment->created_at}}</span></div>
                                            <div class="comment-body">
                                                <span class="comment">{{$comment->comment_detail}}</span>
                                            </div>
                                            <div>
                                                @if($comment->comment_image == NULL)
                                                <div></div>
                                                @else
                                                <img src="{{asset('storage/comment/post/'.$comment->comment_detail.'/'.$comment->comment_image)}}" alt="image" style="max-width: 200px ; max-height:200px;">
                                                @endif
                                            </div>
                                            <div class="comment-footer">
                                                <span class="comment-likes">55 <a href="" class="comment-action active"> <i class="far fa-heart"></i></a></span> <span class="comment-reply">66 <a href="" class="comment-action">Replies</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                            </div>
                            <div class="col-4">
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Configuration</div>
                                        @if($comment->deleted_at == NULL)
                                        <a class="dropdown-item" href="{{route('comment.edit',[app()->getLocale(),'comment'=>$post->id])}}">
                                            <i class="fas fa-edit" style="font-size:25px; color:blue;"></i> Edit
                                        </a>
                                        <a class="dropdown-item">
                                            <form action="{{route('post.destroy',['locale'=>app()->getLocale(),'post'=>$post->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn">
                                                    <i class="fas fa-trash" style="font-size:25px; color:red;"></i> Delete
                                                </button>
                                            </form>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-trash" style="font-size:25px; color:grey;"></i>Report
                                        </a>
                                        @else
                                        <a class="dropdown-item" href="{{route('post.restore',[app()->getLocale(),'post'=>$post->id])}}">
                                            <i class="fas fa-trash-restore" style="font-size:25px; color:blue; "></i> Restore
                                        </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!--====COMMENT AREA START====-->
                    </div>
                </div>
                <!-- Post /////-->
                @endforeach
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</div>
@endsection