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

                    <a class="nav-item nav-link" id="nav-add-tab" data-toggle="tab" href="#nav-add" role="tab" aria-controls="nav-add" aria-selected="false">{{__('Add Community')}}</a>
                    <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false">{{__('Edit Community')}}</a>
                    <a class="nav-item nav-link" id="nav-delete-tab" data-toggle="tab" href="#nav-delete" role="tab" aria-controls="nav-delete" aria-selected="false">{{__('Delete Community')}}</a>
                    <a class="nav-item nav-link" id="nav-restore-tab" data-toggle="tab" href="#nav-restore" role="tab" aria-controls="nav-restore" aria-selected="false">{{__('Restore Community')}}</a>

                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">

                    <form action="{{ route('cheat.community.store',app()->getLocale())}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" class="form-control form-control-lg has-feedback{{ $errors->has('title') ? ' has-error' : '' }}" placeholder="{{__('Enter Title')}}" required>
                        </div>

                        <div class="form-group">

                            <div>
                                <a href="#" class="btn btn-block btn-info">
                                    <label for="banner">{{__('Upload Your Banner image')}}</label>
                                    <input type="file" class="form-control has-feedback{{ $errors->has('banner') ? ' has-error' : '' }}" name="banner" id="banner" style="display: none;" required>
                                </a>
                            </div>
                            <br>
                            <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview Banner" style="max-width:450px ; max-height:450px;">

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}">
                            <input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}">
                            <button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}</button>
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
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Form Add Community </span>

                                <div class="card-body pt-0">
                                    <p> &lt;form action="{
                                        { route('')}
                                        }" method="POST" enctype="multipart/form-data"></p>
                                    <p> @
                                        csrf</p>
                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;input type="text" name="title" class="form-control form-control-lg has-feedback{{ $errors->has('title') ? ' has-error' : '' }}" placeholder="{{__('Enter Title')}}" required></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;div class="form-group"></p>

                                    <p> &lt;div></p>
                                    <p> &lt;a href="#" class="btn btn-block btn-info"></p>
                                    <p> &lt;label for="banner">{{__('Upload Your Banner image')}}&lt;/label></p>
                                    <p> &lt;input type="file" class="form-control has-feedback{{ $errors->has('banner') ? ' has-error' : '' }}" name="banner" id="banner" style="display: none;" required></p>
                                    <p> &lt;/a></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;br></p>
                                    <p> &lt;img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview Banner" style="max-width:450px ; max-height:450px;"></p>

                                    <p> &lt;/div></p>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}"></p>
                                    <p> &lt;input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}"></p>
                                    <p> &lt;button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}&lt;/button></p>
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
                                    <p> @
                                        endforeach</p>
                                    <p> &lt;/ul></p>
                                    <p> &lt;/div></p>

                                    <p> @
                                        endif</p>
                                    <p> &lt;/form></p>
                                    <p> &lt;/div></p>
                                </div>

                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Javascript</span>
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

                                    <p> function PreviewImage2(input) {</p>
                                    <p> if (input.files && input.files[0]) {</p>
                                    <p> var reader = new FileReader();</p>

                                    <p> reader.onload = function(e) {</p>
                                    <p> $('#image_preview_container2').attr('src', e.target.result);</p>
                                    <p> }</p>

                                    <p> reader.readAsDataURL(input.files[0]);</p>
                                    <p> }</p>
                                    <p> }</p>

                                    <p> $(".btn-info #banner").change(function() {</p>
                                    <p> PreviewImage(this);</p>
                                    <p> });</p>

                                    <p> $(".custom-file #image").change(function() {</p>
                                    <p> PreviewImage(this);</p>
                                    <p> });</p>

                                    <p> $(".camera #comment_image").change(function() {</p>
                                    <p> PreviewImage2(this);</p>
                                    <p> });</p>

                                    <p> $("[data-toggle=tooltip]").tooltip();</p>

                                    <p> });</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Community Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function store(StoreCommunity $request)</p>
                                    <p> {</p>
                                    <p> $data = $request->validated();</p>

                                    <p> $community = new Community;</p>

                                    <p> $community->title = $data['title'];</p>
                                    <p> if ($request->hasFile('banner')) {</p>

                                    <p> $community->banner = $request->file('banner');</p>

                                    <p> $extension = $community->banner->getClientOriginalExtension();</p>
                                    <p> $filename = $data['title'] . '.' . $extension;</p>
                                    <p> $path = storage_path('app/public/community/' . $data['title'] . '/');</p>

                                    <p> $community->banner->move($path, $filename);</p>
                                    <p> }</p>
                                    <p> $data['banner'] = $filename;</p>

                                    <p> $community->banner = $data['banner'];</p>
                                    <p> $community->save();</p>
                                    <p> return redirect()->route('');</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Request</span>
                                <div class="card-body pt-0">
                                    <p> public function rules()</p>
                                    <p> {</p>
                                    <p> return [</p>
                                    <p> 'title' => 'required',</p>
                                    <p> 'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',</p>
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
                                        <th>{{__('Banner')}}</th>
                                        <th>{{__('Edit')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($communities as $community)
                                    <tr>
                                        <td>{{$community->title}}</td>
                                        <td>
                                            @if ($community->banner == NULL)
                                            <img src="{{asset('storage/default.png')}}" alt="" style="width: 300px; height: 300px;" />
                                            @else
                                            <img src="{{asset('storage/community/'.$community->title.'/'.$community->banner)}}" alt="Image" style="width: 300px; height: 300px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if($community->deleted_at == NULL)
                                            <a href="{{ route('cheat.community.edit', ['locale'=>app()->getLocale(),'community' => $community->id])}}" class="btn-hover">
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
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Blade view</span>

                                <div class="card-body pt-0">
                                    <p> &lt;form action="{
                                        { route('')}
                                        }" method="POST" enctype="multipart/form-data"></p>
                                    <p> @
                                        csrf</p>
                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;input type="text" name="title" class="form-control form-control-lg has-feedback{{ $errors->has('title') ? ' has-error' : '' }}" placeholder="{{__('Enter Title')}}" value="{{$community->title}} required></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;div class="form-group"></p>

                                    <p> &lt;div></p>
                                    <p> &lt;a href="#" class="btn btn-block btn-info"></p>
                                    <p> &lt;label for="banner">{{__('Upload Your Banner image')}}&lt;/label></p>
                                    <p> &lt;input type="file" class="form-control has-feedback{{ $errors->has('banner') ? ' has-error' : '' }}" name="banner" id="banner" style="display: none;" required></p>
                                    <p> &lt;/a></p>
                                    <p> &lt;/div></p>
                                    <p> &lt;br></p>
                                    <p> &lt;img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview Banner" style="max-width:450px ; max-height:450px;"></p>

                                    <p> &lt;/div></p>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;input type="submit" class="btn btn-success btn-md" value="{{__('Submit')}}"></p>
                                    <p> &lt;input type="reset" class="btn btn-warning btn-md" value="{{__('Reset')}}"></p>
                                    <p> &lt;button type="button" class="btn btn-danger btn-md" onclick="window.history.back()">{{__('Cancel')}}&lt;/button></p>
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
                                    <p> @
                                        endforeach</p>
                                    <p> &lt;/ul></p>
                                    <p> &lt;/div></p>

                                    <p> @
                                        endif</p>
                                    <p> &lt;/form></p>
                                    <p> &lt;/div></p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Community Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function update(StoreCommunity $request, $community)</p>
                                    <p> {</p>
                                    <p> $data = $request->validated();</p>

                                    <p> $community = $this->communityRepo->showcommunity($community);</p>

                                    <p> $community->title = $data['title'];</p>

                                    <p> $old_banner = $community->banner;</p>

                                    <p> if ($request->hasFile('banner')) {</p>

                                    <p> $community->banner = $data['banner'];</p>

                                    <p> $extension = $community->banner->getClientOriginalExtension();</p>


                                    <p> $filename = $data['title'] . '.' . $extension;</p>

                                    <p>$path = storage_path('app/public/community/' . $data['title'] . '/');</p>

                                    <p> if (!file_exists($path . $filename)) {</p>

                                    <p> $community->banner->move($path, $filename);</p>
                                    <p> } else if (!file_exists($path . $old_banner)) {</p>

                                    <p> $community->banner->move($path, $filename);</p>
                                    <p> } else {</p>

                                    <p> unlink($path . $old_banner);</p>
                                    <p> $community->banner->move($path, $filename);</p>
                                    <p> }</p>
                                    <p> }</p>
                                    <p>$community->banner = $filename;</p>
                                    <p> $community->update();</p>
                                    <p> return redirect()->route('');</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Javascript</span>
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

                                    <p> function PreviewImage2(input) {</p>
                                    <p> if (input.files && input.files[0]) {</p>
                                    <p> var reader = new FileReader();</p>

                                    <p> reader.onload = function(e) {</p>
                                    <p> $('#image_preview_container2').attr('src', e.target.result);</p>
                                    <p> }</p>

                                    <p> reader.readAsDataURL(input.files[0]);</p>
                                    <p> }</p>
                                    <p> }</p>

                                    <p> $(".btn-info #banner").change(function() {</p>
                                    <p> PreviewImage(this);</p>
                                    <p> });</p>

                                    <p> $(".custom-file #image").change(function() {</p>
                                    <p> PreviewImage(this);</p>
                                    <p> });</p>

                                    <p> $(".camera #comment_image").change(function() {</p>
                                    <p> PreviewImage2(this);</p>
                                    <p> });</p>

                                    <p> $("[data-toggle=tooltip]").tooltip();</p>

                                    <p> });</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                                <div class="card-body pt-0">
                                    <p> public function showcommunity($id)</p>
                                    <p> {</p>
                                    <p> return $this->model->findOrFail($id);</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Request</span>
                                <div class="card-body pt-0">
                                    <p> public function rules()</p>
                                    <p> {</p>
                                    <p> return [</p>
                                    <p> 'title' => 'required',</p>
                                    <p> 'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',</p>
                                    <p> ];</p>
                                    <p> }</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Banner')}}</th>
                                        <th>{{__('Edit')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($communities as $community)
                                    <tr>
                                        <td>{{$community->title}}</td>
                                        <td>
                                            @if ($community->banner == NULL)
                                            <img src="{{asset('storage/default.png')}}" alt="" style="width: 300px; height: 300px;" />
                                            @else
                                            <img src="{{asset('storage/community/'.$community->title.'/'.$community->banner)}}" alt="Image" style="width: 300px; height: 300px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if($community->deleted_at == NULL)
                                            <a href="{{ route('cheat.community.destroy', ['locale'=>app()->getLocale(),'community' => $community->id])}}" class="btn-hover">
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
                    <div class="container mb-5 mt-5">
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Blade view</span>

                                <div class="card-body pt-0">
                                    <p> &lt;a href="{
                                        { route('')}
                                        }" class="btn-hover"></p>
                                    <p> &lt;i class="fas fa-trash" style="font-size:25px; color:red;"> &lt;/i></p>
                                    <p> &lt;/a></p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Community Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function destroy($locale, $community)</p>
                                    <p> {</p>

                                    <p> $this->communityRepo->deletecommunity($community);</p>
                                    <p> return redirect()->back();</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                                <div class="card-body pt-0">
                                    <p> public function deletecommunity($id)</p>
                                    <p> { </p>
                                    <p> $community = $this->model->findOrFail($id);</p>

                                    <p> return $community->delete();</p>
                                    <p> }</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-restore" role="tabpanel" aria-labelledby="nav-restore-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('Title')}}</th>
                                        <th>{{__('Banner')}}</th>
                                        <th>{{__('Edit')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($communities as $community)
                                    <tr>
                                        <td>{{$community->title}}</td>
                                        <td>
                                            @if ($community->banner == NULL)
                                            <img src="{{asset('storage/default.png')}}" alt="" style="width: 300px; height: 300px;" />
                                            @else
                                            <img src="{{asset('storage/community/'.$community->title.'/'.$community->banner)}}" alt="Image" style="width: 300px; height: 300px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if($community->deleted_at == NULL)

                                            @else
                                            <a href="{{ route('cheat.community.restore', ['locale'=>app()->getLocale(),'community' => $community->id])}}" class="btn-hover">
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
                    <hr>
                    <div class="container mb-5 mt-5">
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Blade view</span>

                                <div class="card-body pt-0">
                                    <p> &lt;a href="{
                                        { route('')}
                                        }" class="btn-hover"></p>
                                    <p> &lt;i class="fas fa-trash" style="font-size:25px; color:red;"> &lt;/i></p>
                                    <p> &lt;/a></p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Community Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function resotre($locale, $community)</p>
                                    <p> {</p>

                                    <p> $this->communityRepo->restorecommunity($community);</p>
                                    <p> return redirect()->back();</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                                <div class="card-body pt-0">
                                    <p> public function restorecommunity($id)</p>
                                    <p> { </p>
                                    <p> return $this->model->onlyTrashed()->where('id',$id)->restore();</p>
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