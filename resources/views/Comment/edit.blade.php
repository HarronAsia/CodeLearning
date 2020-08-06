@extends('layouts.app')

@section('content')

<div class="row" style="padding-top: 10px;">
    <div class="col-12">

        <form action="{{route('comment.store',['post'=>$post->id, app()->getLocale()])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

            <div class="input-group ">
                <span class="input-group-addon ">
                    <label class="btn btn-file camera">
                        <i class="fa fa-camera" style="margin-top:10px;"></i>
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
@endsection