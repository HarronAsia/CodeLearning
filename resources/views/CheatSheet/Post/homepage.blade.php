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
    img{
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
        <div class="col-xl-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link" id="nav-add-tab" data-toggle="tab" href="#nav-add" role="tab" aria-controls="nav-add" aria-selected="false">{{__('Add Post')}}</a>
                    <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false">{{__('Edit Post')}}</a>
                    <a class="nav-item nav-link" id="nav-delete-tab" data-toggle="tab" href="#nav-delete" role="tab" aria-controls="nav-delete" aria-selected="false">{{__('Delete Post')}}</a>
                    <a class="nav-item nav-link" id="nav-restore-tab" data-toggle="tab" href="#nav-restore" role="tab" aria-controls="nav-restore" aria-selected="false">{{__('Restore Post')}}</a>

                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">

                    <form action="{{route('cheat.post.store', [app()->getLocale()])}}" id="PostCreate" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id??''}}">
                                    <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label class=" sr-only" for="title">{{__('Title')}}</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="{{__('What is the Topic?')}}" />
                                    </div>

                                    <div class="form-group has-feedback{{ $errors->has('detail') ? ' has-error' : '' }}">
                                        <label class=" sr-only" for="detail">{{__('Detail')}}</label>
                                        <textarea class="form-control" id="detail" name="detail" rows="3" placeholder="{{__('What are you thinking?')}}"></textarea>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="images-tab">
                                    <div class="form-group has-feedback{{ $errors->has('image') ? ' has-error' : '' }}">

                                        <div class="custom-file">
                                            <label class="custom-file-label" for="image">{{__('Upload image')}}</label>
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                        </div>
                                    </div>

                                    <div class="py-4"> <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview Banner" style="max-width:400px ; max-height:400px;"></div>
                                </div>
                            </div>
                            <div class="btn-toolbar justify-content-between">
                                <div class="btn-group">
                                    <button type="submit" name="post_form" class="btn btn-primary">{{__('Share')}}</button>
                                </div>
                                <div class="btn-group has-feedback{{ $errors->has('community_id') ? ' has-error' : '' }}">
                                    <label for="community_id">Community
                                        <select class="form-control" name="community_id" id="community_id">
                                            @foreach($communities as $community)
                                            <option value="{{$community->id}}">{{$community->title}}</option>
                                            @endforeach
                                        </select>
                                    </label>


                                </div>
                                <div class="btn-group has-feedback{{ $errors->has('status') ? ' has-error' : '' }}">

                                    <select class="form-control" name="status" id="status">
                                        <option value="Public">{{__('Public')}}</option>
                                        <option value="Friends">{{__('Friends')}}</option>
                                        <option value="Private">{{__('Private')}}</option>
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
                    <hr>
                    <div class="container mb-5 mt-5">
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Form Add Post </span>

                                <div class="card-body pt-0">
                                    <p> &lt;form action="{
                                        {route('')}
                                        }" id="PostCreate" method="POST" enctype="multipart/form-data"></p>
                                    <p> @
                                        csrf</p>
                                    <p> &lt;div class="card-body"></p>
                                    <p> &lt;div class="tab-content" id="myTabContent"></p>
                                    <p> &lt;div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab"></p>
                                    <p> &lt;input type="hidden" name="user_id" value="{
                                        {Auth::user()->id??''}
                                        }"></p>
                                    <p> &lt;div class="form-group has-feedback{
                                        { $errors->has('title') ? ' has-error' : '' }
                                        }"></p>
                                    <p> &lt;label class=" sr-only" for="title">{{__('Title')}}&lt;/label></p>
                                    <p> &lt;input type="text" class="form-control" id="title" name="title" placeholder="{{__('What is the Topic?')}}" /></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;iv class="form-group has-feedback{
                                        { $errors->has('detail') ? ' has-error' : '' }
                                        }"></p>
                                    <p> &lt;label class=" sr-only" for="detail">{{__('Detail')}}&lt;/label></p>
                                    <p> &lt;textarea class="form-control" id="detail" name="detail" rows="3" placeholder="{{__('What are you thinking?')}}">&lt;/textarea></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;/div></p>
                                    <p> &lt;div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="images-tab"></p>
                                    <p> &lt;div class="form-group has-feedback{
                                        { $errors->has('image') ? ' has-error' : '' }
                                        }"></p>

                                    <p> &lt;div class="custom-file"></p>
                                    <p> &lt;label class="custom-file-label" for="image">{{__('Upload image')}}&lt;/label></p>
                                    <p> &lt;input type="file" class="custom-file-input" id="image" name="image"></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;div class="py-4"> &lt;img id="image_preview_container" src="{
                                        {asset('storage/default.png')}
                                        }" alt="preview Banner" style="max-width:400px ; max-height:400px;">&lt;/div></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;div class="btn-toolbar justify-content-between"></p>
                                    <p> &lt;div class="btn-group"></p>
                                    <p> &lt;button type="submit" name="post_form" class="btn btn-primary">{{__('Share')}}&lt;/button></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;div class="btn-group has-feedback{
                                        { $errors->has('community_id') ? ' has-error' : '' }
                                        }"></p>
                                    <p> &lt;label for="community_id">Community</p>
                                    <p> &lt;select class="form-control" name="community_id" id="community_id"></p>
                                    <p> @
                                        foreach($communities as $community)</p>
                                    <p> &lt;option value="{{$community->id}}">{
                                        {$community->title}
                                        }&lt;/option></p>
                                    <p> @
                                        endforeach</p>
                                    <p> &lt;/select></p>
                                    <p> &lt;/label></p>


                                    <p> &lt;/div></p>
                                    <p> &lt;div class="btn-group has-feedback{
                                        { $errors->has('status') ? ' has-error' : '' }
                                        }"></p>

                                    <p> &lt;select class="form-control" name="status" id="status"></p>
                                    <p> &lt;option value="Public">{{__('Public')}}&lt;/option></p>
                                    <p> &lt;option value="Friends">{{__('Friends')}}&lt;/option></p>
                                    <p> &lt;option value="Private">{{__('Private')}}&lt;/option></p>
                                    <p> &lt;/select></p>

                                    <p> &lt;/div></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;/div></p>
                                    <p> @
                                        if ($errors->any())</p>
                                    <p> &lt;div class="alert alert-danger"></p>
                                    <p> &lt;ul></p>
                                    <p> @
                                        foreach ($errors->all() as $error)</p>
                                    <p> &lt;li>{
                                        { $error }
                                        }&lt;/li></p>
                                    <p>@
                                        endforeach</p>
                                    <p> &lt;/ul></p>
                                    <p> &lt;/div></p>

                                    <p>@
                                        endif</p>
                                    <p> &lt;/form></p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Javascript</span>
                                <div class="card-body pt-0">
                                    <p> $(document).ready(function() {</p>
                                    <p> $('.has-animation').each(function(index) {</p>
                                    <p> $(this).delay($(this).data('delay')).queue(function() {</p>
                                    <p> $(this).addClass('animate-in');</p>
                                    <p> });</p>
                                    <p> });</p>

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

                                    <p> $("#banner").change(function() {</p>
                                    <p> PreviewImage(this);</p>
                                    <p> });</p>

                                    <p> $(".custom-file #image").change(function() {</p>
                                    <p> PreviewImage(this);</p>
                                    <p> });</p>


                                    <p> $("#news-slider4").owlCarousel({</p>
                                    <p> items: 3,</p>
                                    <p> itemsDesktop: [1199, 3],</p>
                                    <p> itemsDesktopSmall: [1000, 2],</p>
                                    <p> itemsMobile: [600, 1],</p>
                                    <p> pagination: false,</p>
                                    <p> navigationText: false,</p>
                                    <p> autoPlay: true</p>
                                    <p> });</p>

                                    <p> $("[data-toggle=tooltip]").tooltip();</p>


                                    <p> });</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Post Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function store(StorePost $request,$locale)</p>
                                    <p> {</p>

                                    <p> if ($request->has('post_form')) {</p>
                                    <p> $data = $request->validated();</p>

                                    <p> $post = new Post();</p>

                                    <p> $post->title = $data['title'];</p>
                                    <p> $post->detail = $data['detail'];</p>
                                    <p> $post->user_id = $data['user_id'];</p>
                                    <p> $post->community_id = $data['community_id'];</p>

                                    <p> if ($request->hasFile('image')) {</p>

                                    <p> $extension = $data['image']->getClientOriginalExtension();</p>
                                    <p> $filename = $data['title'] . '.' . $extension;</p>
                                    <p> $path = storage_path('app/public/post/' . $data['title'] . '/');</p>

                                    <p> $data['image']->move($path, $filename);</p>
                                    <p> $data['image'] = $filename;</p>
                                    <p> $post->image = $data['image'];</p>
                                    <p> $post->save();</p>
                                    <p> return redirect()->back();</p>
                                    <p> } else {</p>

                                    <p> $post->save();</p>
                                    <p> return redirect()->back();</p>
                                    <p> }</p>
                                    <p> }</p>
                                    <p>}</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Request</span>
                                <div class="card-body pt-0">
                                    <p> public function rules()</p>
                                    <p> {</p>
                                    <p> // dd(request()->all());</p>
                                    <p> return [</p>
                                    <p> 'title' =>'required',</p>
                                    <p> 'detail'=> '|min:3|max:1000',</p>
                                    <p> 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',</p>
                                    <p> 'status' => 'required',</p>
                                    <p> 'user_id' => 'required',</p>
                                    <p> 'community_id' =>'required',</p>
                                    <p> ];</p>
                                    <p> }</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Detail')}}</th>
                                        <th>{{__('Banner')}}</th>
                                        <th>{{__('Edit')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->detail}}</td>
                                        <td>
                                            @if ($post->image == NULL)
                                            <img src="{{asset('storage/default.png')}}" alt="" style="width: 300px; height: 300px;" />
                                            @else
                                            <img src="{{asset('storage/post/'.$post->title.'/'.$post->image)}}" alt="Image" style="width: 300px; height: 300px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->deleted_at == NULL)
                                            <a href="{{ route('cheat.post.edit', ['locale'=>app()->getLocale(),'post' => $post->id])}}" class="btn-hover">
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
                    </div>

                    <hr>
                    <div class="container mb-5 mt-5">
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Form Edit Post </span>

                                <div class="card-body pt-0">
                                    <p> &lt;form action="{
                                        {route('')}
                                        }" id="PostEdit" method="POST" enctype="multipart/form-data"></p>
                                    <p> @
                                        csrf</p>
                                    <p> &lt;div class="card-body"></p>
                                    <p> &lt;div class="tab-content" id="myTabContent"></p>
                                    <p> &lt;div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab"></p>
                                    <p> &lt;input type="hidden" name="user_id" value="{
                                        {Auth::user()->id??''}
                                        }"></p>
                                    <p> &lt;div class="form-group has-feedback{
                                        { $errors->has('title') ? ' has-error' : '' }
                                        }"></p>
                                    <p> &lt;label class=" sr-only" for="title">{{__('Title')}}&lt;/label></p>
                                    <p> &lt;input type="text" class="form-control" id="title" name="title" placeholder="{{__('What is the Topic?')}}" /></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;iv class="form-group has-feedback{
                                        { $errors->has('detail') ? ' has-error' : '' }
                                        }"></p>
                                    <p> &lt;label class=" sr-only" for="detail">{{__('Detail')}}&lt;/label></p>
                                    <p> &lt;textarea class="form-control" id="detail" name="detail" rows="3" placeholder="{{__('What are you thinking?')}}">&lt;/textarea></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;/div></p>
                                    <p> &lt;div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="images-tab"></p>
                                    <p> &lt;div class="form-group has-feedback{
                                        { $errors->has('image') ? ' has-error' : '' }
                                        }"></p>

                                    <p> &lt;div class="custom-file"></p>
                                    <p> &lt;label class="custom-file-label" for="image">{{__('Upload image')}}&lt;/label></p>
                                    <p> &lt;input type="file" class="custom-file-input" id="image" name="image"></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;div class="py-4"> &lt;img id="image_preview_container" src="{
                                        {asset('storage/default.png')}
                                        }" alt="preview Banner" style="max-width:400px ; max-height:400px;">&lt;/div></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;div class="btn-toolbar justify-content-between"></p>
                                    <p> &lt;div class="btn-group"></p>
                                    <p> &lt;button type="submit" name="post_form" class="btn btn-primary">{{__('Share')}}&lt;/button></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;div class="btn-group has-feedback{
                                        { $errors->has('community_id') ? ' has-error' : '' }
                                        }"></p>
                                    <p> &lt;label for="community_id">Community</p>
                                    <p> &lt;select class="form-control" name="community_id" id="community_id"></p>
                                    <p> @
                                        foreach($communities as $community)</p>
                                    <p> &lt;option value="{{$community->id}}">{
                                        {$community->title}
                                        }&lt;/option></p>
                                    <p> @
                                        endforeach</p>
                                    <p> &lt;/select></p>
                                    <p> &lt;/label></p>


                                    <p> &lt;/div></p>
                                    <p> &lt;div class="btn-group has-feedback{
                                        { $errors->has('status') ? ' has-error' : '' }
                                        }"></p>

                                    <p> &lt;select class="form-control" name="status" id="status"></p>
                                    <p> &lt;option value="Public">{{__('Public')}}&lt;/option></p>
                                    <p> &lt;option value="Friends">{{__('Friends')}}&lt;/option></p>
                                    <p> &lt;option value="Private">{{__('Private')}}&lt;/option></p>
                                    <p> &lt;/select></p>

                                    <p> &lt;/div></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;/div></p>
                                    <p> @
                                        if ($errors->any())</p>
                                    <p> &lt;div class="alert alert-danger"></p>
                                    <p> &lt;ul></p>
                                    <p> @
                                        foreach ($errors->all() as $error)</p>
                                    <p> &lt;li>{
                                        { $error }
                                        }&lt;/li></p>
                                    <p>@
                                        endforeach</p>
                                    <p> &lt;/ul></p>
                                    <p> &lt;/div></p>

                                    <p>@
                                        endif</p>
                                    <p> &lt;/form></p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Javascript</span>
                                <div class="card-body pt-0">
                                    <p> $(document).ready(function() {</p>
                                    <p> $('.has-animation').each(function(index) {</p>
                                    <p> $(this).delay($(this).data('delay')).queue(function() {</p>
                                    <p> $(this).addClass('animate-in');</p>
                                    <p> });</p>
                                    <p> });</p>

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

                                    <p> $("#banner").change(function() {</p>
                                    <p> PreviewImage(this);</p>
                                    <p> });</p>

                                    <p> $(".custom-file #image").change(function() {</p>
                                    <p> PreviewImage(this);</p>
                                    <p> });</p>


                                    <p> $("#news-slider4").owlCarousel({</p>
                                    <p> items: 3,</p>
                                    <p> itemsDesktop: [1199, 3],</p>
                                    <p> itemsDesktopSmall: [1000, 2],</p>
                                    <p> itemsMobile: [600, 1],</p>
                                    <p> pagination: false,</p>
                                    <p> navigationText: false,</p>
                                    <p> autoPlay: true</p>
                                    <p> });</p>

                                    <p> $("[data-toggle=tooltip]").tooltip();</p>


                                    <p> });</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Post Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function update(StorePost $request,$locale, $post)</p>
                                    <p> {</p>
                                    <p> $data = $request->validated();</p>

                                    <p> $post = $this->postRepo->showpost($post);</p>

                                    <p> $old_image = $post->image;</p>
                                    <p> $old_title = $post->title;</p>

                                    <p> $post->title = $data['title'];</p>
                                    <p> $post->detail = $data['detail'];</p>
                                    <p> $post->user_id = $data['user_id'];</p>
                                    <p> $post->community_id = $data['community_id'];</p>

                                    <p> if ($request->hasFile('image')) {</p>

                                    <p> $extension = $data['image']->getClientOriginalExtension();</p>
                                    <p> $filename = $data['title'] . '.' . $extension;</p>
                                    <p> $path = storage_path('app/public/post/' . $data['title'] . '/');</p>
                                    <p> $oldpath = storage_path('app/public/post/' . $old_title . '/');</p>
                                    <p> if (!file_exists($path . $filename)) {</p>

                                    <p> $data['image']->move($path, $filename);</p>
                                    <p> } elseif (!file_exists($path . $old_image)) {</p>

                                    <p> $data['image']->move($path, $filename);</p>
                                    <p> unlink($path . $old_image);</p>
                                    <p> } else {</p>
                                    <p> unlink($oldpath . $old_image);</p>
                                    <p> $data['image']->move($path, $filename);</p>
                                    <p> }</p>
                                    <p> $data['image'] = $filename;</p>
                                    <p> $post->image = $data['image'];</p>
                                    <p> $post->update();</p>
                                    <p> return redirect()->route('community.show', $post->community_id);</p>
                                    <p> } else {</p>

                                    <p> $post->update();</p>
                                    <p> return redirect()->route('community.show', $post->community_id);</p>
                                    <p> }</p>
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
                                    <p> 'title' =>'required',</p>
                                    <p> 'detail'=> '|min:3|max:1000',</p>
                                    <p> 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',</p>
                                    <p> 'status' => 'required',</p>
                                    <p> 'user_id' => 'required',</p>
                                    <p> 'community_id' =>'required',</p>
                                    <p> ];</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                                <div class="card-body pt-0">
                                    <p> public function showpost($id)</p>
                                    <p> {</p>
                                    <p>return $this->model = Post::findOrFail($id);</p>
                                    <p>}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Detail')}}</th>
                                        <th>{{__('Banner')}}</th>
                                        <th>{{__('Edit')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->detail}}</td>
                                        <td>
                                            @if ($post->image == NULL)
                                            <img src="{{asset('storage/default.png')}}" alt="" style="width: 300px; height: 300px;" />
                                            @else
                                            <img src="{{asset('storage/post/'.$post->title.'/'.$post->image)}}" alt="Image" style="width: 300px; height: 300px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->deleted_at == NULL)
                                            <a href="{{ route('cheat.post.destroy', ['locale'=>app()->getLocale(),'post' => $post->id])}}" class="btn-hover">
                                                <i class="fas fa-trash" style="font-size:25px; color:red;"></i>
                                            </a>
                                            @else

                                            @endif
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>

                    <hr>
                    <hr>
                    <div class="container mb-5 mt-5">
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Blade View </span>

                                <div class="card-body pt-0">
                                    <p> &lt;a href="{{ route('cheat.post.destroy', ['locale'=>app()->getLocale(),'post' => $post->id])}}" class="btn-hover"></p>
                                    <p> &lt;i class="fas fa-trash" style="font-size:25px; color:red;">&lt;/i></p>
                                    <p> &lt;/a></p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Post Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function destroy($locale,$post)</p>
                                    <p> {</p>
                                    <p> $this->postRepo->deletepost($post);</p>
                                    <p> return redirect()->back();</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                                <div class="card-body pt-0">
                                    <p> public function deletepost($id)</p>
                                    <p>{</p>

                                    <p> $this->model = Post::findOrFail($id);</p>

                                    <p> return $this->model->delete();</p>
                                    <p>}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-restore" role="tabpanel" aria-labelledby="nav-restore-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Detail')}}</th>
                                        <th>{{__('Image')}}</th>
                                        <th>{{__('Edit')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->detail}}</td>
                                        <td>
                                            @if ($post->banner == NULL)
                                            <img src="{{asset('storage/default.png')}}" alt="" style="width: 300px; height: 300px;" />
                                            @else
                                            <img src="{{asset('storage/post/'.$post->title.'/'.$post->banner)}}" alt="Image" style="width: 300px; height: 300px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->deleted_at == NULL)

                                            @else
                                            <a href="{{ route('cheat.post.restore', ['locale'=>app()->getLocale(),'post' => $post->id])}}" class="btn-hover">
                                                <i class="fas fa-trash-alt" style="font-size:25px; color:green;"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                    <hr>
                    <div class="container mb-5 mt-5">
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Blade View </span>

                                <div class="card-body pt-0">
                                    <p> &lt;a href="{{ route('cheat.post.destroy', ['locale'=>app()->getLocale(),'post' => $post->id])}}" class="btn-hover"></p>
                                    <p> &lt;i class="fas fa-trash-alt" style="font-size:25px; color:green;">&lt;/i></p>
                                    <p> &lt;/a></p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Post Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function restore($locale,$post)</p>
                                    <p> {</p>
                                    <p> $this->postRepo->restorepost($post);</p>
                                    <p> return redirect()->back();</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                                <div class="card-body pt-0">
                                    <p> public function restorepost($id)</p>
                                    <p> {</p>

                                    <p> return $this->model = Post::onlyTrashed()->where('id',$id)->restore();</p>

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