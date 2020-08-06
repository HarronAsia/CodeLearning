@extends('layouts.app')

@section('content')
<style>
    img{
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

                        <form action="{{ route('community.store', app()->getLocale())}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="title" class="form-control form-control-lg" placeholder="Enter Title" required>
                            </div>

                            <div class="form-group">
                                <div>
                                    <label for="banner">Upload Your Banner image</label>
                                    <input type="file" class="form-control" name="banner" id="banner" required>
                                </div>
                                <br>
                                <img id="image_preview_container" src="{{asset('storage/blank.png')}}" alt="preview Banner" style="max-width:450px ; max-height:450px;">

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