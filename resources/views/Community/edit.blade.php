@extends('layouts.Community.app')

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
                        <h4 class="modal-title text-light">{{__('Edit Community')}}</h4>
                    </div>

                    <div class="modal-body">

                        <form action="{{ route('community.update',['locale'=>app()->getLocale(),'community'=>$community->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" class="form-control form-control-lg" value="{{$community->id}}" required>
                            <div class="form-group">
                                <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" value="{{$community->title}}" required>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button>
                                        <label for="banner">{{__('Upload Your Banner image')}}</label>
                                    </button>
                                    <input type="file" class="form-control" name="banner" id="banner" style="display: none;"  required>
                                </div>
                                <br>
                                <img src="{{asset('storage/community/'.$community->title.'/'.$community->banner.'/')}}" alt="Image" style="max-width: 500px ; max-height:500px;">
                                &ensp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&ensp;
                                <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview image" style="max-width: 500px ; max-height:500px;">

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
                                <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
                                <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection