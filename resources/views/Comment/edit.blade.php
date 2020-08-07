@extends('layouts.Comment.app')

@section('content')

<style>
    img {
        width: 100%;
        height: auto;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="container">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title text-light">Add Community</h4>
                    </div>

                    <div class="modal-body">

                        <form action="{{route('comment.update',['locale'=>app()->getLocale(),'comment'=>$comment->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div class="form-group">
                                <input class="form-control" name="comment_detail" placeholder="Write your comment here" value="{{$comment->comment_detail}}" required>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label class="btn btn-file camera">
                                        <i class="fa fa-camera" style="margin-top:10px;"></i>
                                        <input class="form-control " type="file" id="comment_image" name="comment_image" style="display: none;" />
                                    </label>
                                </div>
                                <br>
                                @if($comment->comment_image == NULL)
                                <div></div>
                                @else
                                <img src="{{asset('storage/comment/post/'.$comment->comment_detail.'/'.$comment->comment_image)}}" alt="image" style="max-width: 350px ; max-height:350px;">
                                @endif
                                &ensp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&ensp;
                                <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview image" style="max-width: 350px ; max-height:350px;">

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-md">
                                <input type="reset" class="btn btn-warning btn-md">
                                <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">Cancel</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection