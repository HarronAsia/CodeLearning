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
</style>
<form action="{{route('post.update',['post'=>$post->id, app()->getLocale()])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card gedf-card">
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
            </div>

        </div>
        <div class="card-body">
            <input type="hidden" name="user_id" value="{{Auth::user()->id??''}}">
            <input type="hidden" name="community_id" value="{{$post->community_id}}">
            <div class="text-muted h7 mb-2">

                <div class="btn-group has-feedback{{ $errors->has('status') ? ' has-error' : '' }}">

                    <select class="form-control" name="status" id="status">
                        <option value="Public">Public</option>
                        <option value="Friends">Friends</option>
                        <option value="Private">Private</option>
                    </select>


                </div>
                <i class="fa fa-clock-o"></i> 10 min ago
            </div>
            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                <label class=" sr-only" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="What is the Topic?" value="{{$post->title}}" />
            </div>

            <div class="form-group has-feedback{{ $errors->has('detail') ? ' has-error' : '' }}">
                <label class=" sr-only" for="detail">Detail</label>
                <textarea class="form-control" id="detail" name="detail" rows="3" placeholder="What are you thinking?"> {{$post->detail}}</textarea>
            </div>

            <br>

            <div class="form-group has-feedback{{ $errors->has('image') ? ' has-error' : '' }}">
                <div class="custom-file">
                    <label class="custom-file-label" for="image">Upload image</label>
                    <input type="file" class="custom-file-input" id="image" name="image">
                </div>
            </div>

            <div class="py-4">
                @if($post->image == NULL)
                <div>

                </div>
                @else
                <img src="{{asset('storage/post/'.$post->title.'/'.$post->image)}}" alt="image" style="max-width:400px ; max-height:400px;">
                @endif
                <i class="fa fa-arrow-right" style="font-size: 25px;"></i>
                <img id="image_preview_container" src="{{asset('storage/blank.png')}}" alt="preview Banner" style="max-width:400px ; max-height:400px;">
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-group">
                <input type="submit" class="btn btn-success btn-md">
            </div>
            <div class="btn-group">
                <input type="reset" class="btn btn-warning btn-md">
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">Cancel</button>
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
@endsection