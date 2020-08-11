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

    img {
        width: 100%;
        height: auto;
    }

    .pricing {
        width: 100%;
        height: auto;
    }

    .card-pricing {
        width: 100%;
        height: auto;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-add-tab" data-toggle="tab" href="#nav-add" role="tab" aria-controls="nav-add" aria-selected="false">{{__('Add Comment')}}</a>
                    <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false">{{__('Edit Comment')}}</a>
                    <a class="nav-item nav-link" id="nav-delete-tab" data-toggle="tab" href="#nav-delete" role="tab" aria-controls="nav-delete" aria-selected="false">{{__('Delete Comment')}}</a>
                    <a class="nav-item nav-link" id="nav-restore-tab" data-toggle="tab" href="#nav-restore" role="tab" aria-controls="nav-restore" aria-selected="false">{{__('Restore Comment')}}</a>

                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">

                    <form action="{{route('cheat.comment.store',['locale'=>app()->getLocale()])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <div class="btn-group has-feedback{{ $errors->has('post_id') ? ' has-error' : '' }}">

                            <select class="form-control" name="post_id" id="post_id">
                                @foreach($posts as $post)
                                <option value="{{$post->id}}">{{$post->title}}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <label class="btn btn-file camera">
                                    <i class="fa fa-camera" style="margin-top:10px; color:white;"></i>
                                    <input class="form-control has-feedback{{ $errors->has('comment_image') ? ' has-error' : '' }}" type="file" id="comment_image" name="comment_image" style="display: none;" />
                                </label>

                            </span>
                            <input class="form-control has-feedback{{ $errors->has('comment_detail') ? ' has-error' : '' }}" name="comment_detail" placeholder="{{__('Write your comment here')}}" required>
                            <span class="input-group-addon">
                                <button type="submit" class="btn  comment-btn " style="height: 100%;">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </span>
                        </div>
                        <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview Banner" style="max-width:200px ; max-height:200px;">
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

                    <hr>
                    <div class="container mb-5 mt-5">
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Form Add</span>

                                <div class="card-body pt-0">
                                    <p> &lt;form action="{
                                        {route('')}
                                        }" method="POST" enctype="multipart/form-data"></p>
                                    <p> @
                                        csrf</p>
                                    <p> &lt;input type="hidden" name="user_id" value="{{Auth::user()->id}}"></p>
                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;input class="form-control has-feedback{
                                        { $errors->has('comment_detail') ? ' has-error' : '' }
                                        }" name="comment_detail" placeholder="Write your comment here" value="{
                                        {$comment->comment_detail}
                                        }" required></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;div></p>
                                    <p> &lt;label class="btn btn-file camera"></p>
                                    <p> &lt;i class="fa fa-camera" style="margin-top:10px;"> &lt;/i></p>
                                    <p> &lt;input class="form-control has-feedback{
                                        { $errors->has('comment_image') ? ' has-error' : '' }
                                        }" type="file" id="comment_image" name="comment_image" style="display: none;" /></p>
                                    <p> &lt;/label></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;br></p>
                                    <p> @
                                        if($comment->comment_image == NULL)</p>
                                    <p> &lt;div> &lt;/div></p>
                                    <p> @
                                        else</p>
                                    <p> &lt;img src="{
                                        {asset('storage/comment/post/'.$comment->comment_detail.'/'.$comment->comment_image)}
                                        }" alt="image" style="max-width: 350px ; max-height:350px;"></p>
                                    <p> @
                                        endif</p>
                                    <p> &ensp; &lt;i class="fa fa-arrow-right" style="font-size:48px;"> &lt;/i>&ensp;</p>
                                    <p> &lt;img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview image" style="max-width: 350px ; max-height:350px;"></p>

                                    <p>&lt;/div></p>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;input type="submit" class="btn btn-success btn-md"></p>
                                    <p> &lt;input type="reset" class="btn btn-warning btn-md"></p>
                                    <p> &lt;button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">Cancel &lt;/button></p>
                                    <p> &lt;/div></p>
                                    <p> @
                                        if ($errors->any())</p>
                                    <p> &lt;div class="alert alert-danger"></p>
                                    <p> &lt;ul></p>
                                    <p> @
                                        foreach ($errors->all() as $error)</p>
                                    <p> &lt;li>{
                                        { $error }
                                        } &lt;/li></p>
                                    <p> @
                                        endforeach</p>
                                    <p> &lt;/ul></p>
                                    <p> &lt;/div></p>

                                    <p> @
                                        endif</p>
                                    <p> &lt;/form></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-pricing text-center  px-12 mb-12">
                        <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Java Script</span>

                        <div class="card-body pt-0">
                            <p> $(document).ready(function() {</p>
                            <p> function PreviewImage(input) {</p>
                            <p> if (input.files && input.files[0]) {</p>
                            <p> var reader = new FileReader();</p>

                            <p> reader.onload = function(e) {</p>
                            <p> $('#image_preview_container').attr('src', e.target.result);</p>
                            <p> }</p>

                            <p> reader.readAsDataURL(input.files[0]);</p>
                            <p> }</p>
                            <p> }</p>
                            <p> $(".btn-block #photo").change(function(e) {</p>
                            <p> e.preventDefault();</p>
                            <p> PreviewImage(this);</p>
                            <p> });</p>
                            <p> });</p>
                        </div>
                    </div>
                    <div class="card card-pricing text-center  px-12 mb-12">
                        <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">User Controller</span>
                        <div class="card-body pt-0">
                            <p> public function confirm(StoreUser $request, $locale, $profile)</p>
                            <p> {</p>

                            <p> $data = $request->validated();</p>

                            <p> $user = $this->userRepo->showUser($profile);</p>

                            <p> $user->name = $data['name'];</p>
                            <p> $user->number = $data['number'];</p>
                            <p> $user->dob = $data['dob'];</p>
                            <p> $old_photo = $user->photo;</p>

                            <p> if ($request->hasFile('photo')) {</p>

                            <p> $file = $request->file('photo');</p>

                            <p> $extension = $file->getClientOriginalExtension();</p>
                            <p> $filename = $user->name . '.' . $extension;</p>

                            <p> $path = storage_path('app/public/' . $user->name . '/');</p>

                            <p> if (!file_exists($path . $filename)) {</p>

                            <p> $file->move($path, $filename);</p>
                            <p> } else if (!file_exists($path . $old_photo)) {</p>

                            <p> $file->banner->move($path, $filename);</p>
                            <p> } else {</p>

                            <p> unlink($path . $old_photo);</p>
                            <p> $file->banner->move($path, $filename);</p>
                            <p> }</p>
                            <p> $data['photo'] = $filename;</p>
                            <p> }</p>
                            <p> $user->photo = $data['photo'];</p>

                            <p> return view('User.confirm', compact('user'));</p>
                            <p> }</p>
                        </div>
                    </div>
                    <div class="card card-pricing text-center  px-12 mb-12">
                        <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Request</span>
                        <div class="card-body pt-0">
                            <p> public function rules()</p>
                            <p> {</p>
                            <p> // dd(request()->all());</p>
                            <p> return [</p>
                            <p> 'name' => 'required',</p>
                            <p> 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',</p>
                            <p> 'dob' => 'required',</p>
                            <p> 'number' => 'required',</p>
                            <p> ];</p>
                            <p> }</p>
                        </div>
                    </div>
                    <div class="card card-pricing text-center  px-12 mb-12">
                        <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                        <div class="card-body pt-0">
                            <p> public function showUser($id)</p>
                            <p> {</p>
                            <p> return $this->model = User::findOrFail($id);</p>
                            <p> }</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show active" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{__('Comment Detail')}}</th>
                                <th>{{__('Comment Image')}}</th>
                                <th>{{__('Edit')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->comment_detail}}</td>
                                <td>
                                    @if($comment->comment_image == NULL)
                                    <div></div>
                                    @else
                                    <img src="{{asset('storage/comment/post/'.$comment->comment_detail.'/'.$comment->comment_image)}}" alt="image" style="max-width: 200px ; max-height:200px;">
                                    @endif
                                </td>
                                <td>
                                    @if($comment->deleted_at == NULL)
                                    <a href="{{ route('cheat.comment.edit', ['locale'=>app()->getLocale(),'comment' => $comment->id])}}" class="btn-hover">
                                        <i class="fas fa-edit" style="font-size:25px; color:blue;"></i>
                                    </a>
                                    @else

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <hr>
                <div class="container mb-5 mt-5">
                    <div class="pricing card-deck flex-column flex-md-row mb-3">
                        <div class="card card-pricing text-center  px-12 mb-12">
                            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Form Edit</span>

                            <div class="card-body pt-0">
                                <form action="{{route('comment.update',['locale'=>app()->getLocale(),'comment'=>$comment->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <div class="form-group">
                                        <input class="form-control has-feedback{{ $errors->has('comment_detail') ? ' has-error' : '' }}" name="comment_detail" placeholder="Write your comment here" value="{{$comment->comment_detail}}" required>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <label class="btn btn-file camera">
                                                <i class="fa fa-camera" style="margin-top:10px;"></i>
                                                <input class="form-control has-feedback{{ $errors->has('comment_image') ? ' has-error' : '' }}" type="file" id="comment_image" name="comment_image" style="display: none;" />
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
                        </div>
                        <div class="card card-pricing text-center  px-12 mb-12">
                            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Java Script</span>

                            <div class="card-body pt-0">
                                <p> $(document).ready(function() {</p>
                                <p> function PreviewImage(input) {</p>
                                <p> if (input.files && input.files[0]) {</p>
                                <p> var reader = new FileReader();</p>

                                <p> reader.onload = function(e) {</p>
                                <p> $('#image_preview_container').attr('src', e.target.result);</p>
                                <p> }</p>

                                <p> reader.readAsDataURL(input.files[0]);</p>
                                <p> }</p>
                                <p> }</p>
                                <p> $(".btn-block #photo").change(function(e) {</p>
                                <p> e.preventDefault();</p>
                                <p> PreviewImage(this);</p>
                                <p> });</p>
                                <p> });</p>
                            </div>
                        </div>
                        <div class="card card-pricing text-center  px-12 mb-12">
                            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">User Controller</span>
                            <div class="card-body pt-0">
                                <p> public function confirm(StoreUser $request, $locale, $profile)</p>
                                <p> {</p>

                                <p> $data = $request->validated();</p>

                                <p> $user = $this->userRepo->showUser($profile);</p>

                                <p> $user->name = $data['name'];</p>
                                <p> $user->number = $data['number'];</p>
                                <p> $user->dob = $data['dob'];</p>
                                <p> $old_photo = $user->photo;</p>

                                <p> if ($request->hasFile('photo')) {</p>

                                <p> $file = $request->file('photo');</p>

                                <p> $extension = $file->getClientOriginalExtension();</p>
                                <p> $filename = $user->name . '.' . $extension;</p>

                                <p> $path = storage_path('app/public/' . $user->name . '/');</p>

                                <p> if (!file_exists($path . $filename)) {</p>

                                <p> $file->move($path, $filename);</p>
                                <p> } else if (!file_exists($path . $old_photo)) {</p>

                                <p> $file->banner->move($path, $filename);</p>
                                <p> } else {</p>

                                <p> unlink($path . $old_photo);</p>
                                <p> $file->banner->move($path, $filename);</p>
                                <p> }</p>
                                <p> $data['photo'] = $filename;</p>
                                <p> }</p>
                                <p> $user->photo = $data['photo'];</p>

                                <p> return view('User.confirm', compact('user'));</p>
                                <p> }</p>
                            </div>
                        </div>
                        <div class="card card-pricing text-center  px-12 mb-12">
                            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Request</span>
                            <div class="card-body pt-0">
                                <p> public function rules()</p>
                                <p> {</p>
                                <p> // dd(request()->all());</p>
                                <p> return [</p>
                                <p> 'name' => 'required',</p>
                                <p> 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',</p>
                                <p> 'dob' => 'required',</p>
                                <p> 'number' => 'required',</p>
                                <p> ];</p>
                                <p> }</p>
                            </div>
                        </div>
                        <div class="card card-pricing text-center  px-12 mb-12">
                            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                            <div class="card-body pt-0">
                                <p> public function showUser($id)</p>
                                <p> {</p>
                                <p> return $this->model = User::findOrFail($id);</p>
                                <p> }</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>

@endsection