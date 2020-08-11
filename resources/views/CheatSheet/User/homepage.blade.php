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
        width: 100%;
        height: auto;
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
        <div class="col-xs-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false">{{__('Edit User')}}</a>
                    <a class="nav-item nav-link" id="nav-delete-tab" data-toggle="tab" href="#nav-delete" role="tab" aria-controls="nav-delete" aria-selected="false">{{__('Delete User')}}</a>
                    <a class="nav-item nav-link" id="nav-restore-tab" data-toggle="tab" href="#nav-restore" role="tab" aria-controls="nav-restore" aria-selected="false">{{__('Restore User')}}</a>

                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">

                    <div class="row">
                        <div class="col-lg-6">
                            <form action="{{ route('cheat.user.update', ['locale'=>app()->getLocale(),'user' => Auth::user()->id])}} " method="POST" enctype="multipart/form-data" id="editprofile">
                                @csrf

                                <div class="form-group">

                                    @if (Auth::user()->photo == NULL)
                                    <img src="{{asset('storage/user.png')}}" alt="" style="width: 200px; height: 200px;" />
                                    @else
                                    <img src="{{asset('storage/'.Auth::user()->name.'/'.Auth::user()->photo)}}" alt="Image" style="width: 200px; height: 200px;">
                                    @endif
                                    &ensp;<i class="fa fa-arrow-right" style="font-size:48px;"></i>&ensp;
                                    <img id="image_preview_container" src="{{asset('storage/default.png')}}" alt="preview image" style="width: 200px ; height:200px;">
                                    <div style="padding-top: 10px;">
                                        <i class="fas fa-image"></i>&ensp;
                                        <a href="#" class="btn btn-block btn-info">
                                            <label for="photo">{{__('Your Image')}}</label>
                                            <input type="file" class="form-control has-feedback{{ $errors->has('photo') ? ' has-error' : '' }}" name="photo" id="photo" style="display: none;">
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <i class="fas fa-user"></i> &ensp;<label for="name">{{__('Your name')}}</label>
                                    <input class="form-control" name="name" placeholder="Enter Your Name" value="{{ Auth::user()->name}}">
                                </div>

                                <div class="form-group has-feedback{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <i class="fas fa-calendar"></i>&ensp;<label for="dob">{{__('Your Birthday')}}</label>
                                    <input type="date" class="form-control" name="dob" placeholder="Enter Your DOB" value="{{ Auth::user()->dob }}">
                                </div>

                                <div class="form-group has-feedback{{ $errors->has('number') ? ' has-error' : '' }}">
                                    <i class="fas fa-phone"></i>&ensp;<label for="number">{{__('Your Phone Number')}}</label>
                                    <input type="tel" class="form-control" name="number" placeholder="Enter Your Phone Number" value="{{ Auth::user()->number }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                    <button type="reset" class="btn btn-warning">{{__('Reset')}}</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">{{__('Cancel')}}</a>
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
                        <div class="col-lg-6">
                            <div class="container-fluid">
                                <table class="table dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Date Of Birth')}}</th>
                                            <th>{{__('Phone Number')}}</th>
                                            <th>{{__('Avatar Image')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{Auth::user()->name}}</td>
                                            <td>{{Auth::user()->dob}}</td>
                                            <td>{{Auth::user()->number}}</td>
                                            <td>
                                                @if (Auth::user()->photo == NULL)
                                                <img src="{{asset('storage/user.png')}}" alt="" style="width: 120px; height: 120px;" />
                                                @else
                                                <img src="{{asset('storage/'.Auth::user()->name.'/'.Auth::user()->photo)}}" alt="Image" style="width: 120px; height: 120px;">
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="container-fluid ">
                        <div class="pricing card-deck flex-column flex-md-row mb-6">
                            <div class="card card-pricing text-center px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Form Edit</span>

                                <div class="card-body ">
                                    <p> &lt;form action="{{ route('profile.confirm', ['locale'=>app()->getLocale(),'profile' => Auth::user()->id])}} " method="POST" enctype="multipart/form-data" id="editprofile"> </p>
                                    <p> echo '@csrf'; </p>

                                    <p> &lt;div class="form-group"> </p>
                                    <p> @ if ($user->photo == NULL) </p>
                                    <p> &lt;img src="{{asset('storage/user.png')}}" alt="" style="width: 300px; height: 300px;" /> </p>
                                    <p> @ else </p>
                                    <p> &lt;img src="{
                                        {asset('storage/'.$user->name.'/'.$user->photo)}
                                        }" alt="Image" style="width: 300px; height: 300px;"> </p>
                                    <p>@ endif <p>
                                            <p> &ensp;&lt;i class="fa fa-arrow-right" style="font-size:48px;">&lt;/i>&ensp; </p>
                                            <p> &lt;img id="image_preview_container" src="{
                                                {asset('storage/default.png')}
                                                }" alt="preview image" style="width: 300px ; height:300px;"> </p>
                                            <p> &lt;div style="padding-top: 10px;"> </p>
                                            <p> &lt;i class="fas fa-image">&lt;/i>&ensp; </p>
                                            <p> &lt;a href="#" class="btn btn-block btn-info"> </p>
                                            <p> &lt;label for="photo">{
                                                {__('Your Image')}
                                                }&lt;/label> </p>

                                            <p> &lt;input type="file" class="form-control has-feedback{
                                                { $errors->has('photo') ? ' has-error' : '' }
                                                }" name="photo" id="photo" value="{
                                                { $user->photo}
                                                }" style="display: none;"></p>
                                            <p> &lt;/a></p>
                                            <p> &lt;/div></p>
                                            <p> &lt;/div></p>

                                            <p> &lt;div class="form-group has-feedback{
                                                { $errors->has('name') ? ' has-error' : '' }
                                                }"></p>
                                            <p> &lt;i class="fas fa-user">&lt;/i> &ensp;</p>
                                            &lt;label for="name">{
                                            {__('Your name')}
                                            }</label>
                                        </p>
                                        <p>
                                            &lt;input class="form-control" name="name" placeholder="Enter Your Name" value="{
                                            { $user->name}
                                            }"></p>
                                        <p> &lt;/div></p>

                                        <p> &lt;div class="form-group has-feedback{
                                            { $errors->has('dob') ? ' has-error' : '' }
                                            }"></p>
                                        <p>&lt;i class="fas fa-calendar">&lt;/i></p>
                                        <p>&ensp;&lt;label for="dob">{
                                            {__('Your Birthday')}
                                            }&lt;/label></p>
                                        <p> &lt;input type="date" class="form-control" name="dob" placeholder="Enter Your DOB" value="{
                                            { $user->dob }
                                            }"></p>
                                        <p> &lt;/div></p>

                                        <p> &lt;div class="form-group has-feedback{
                                            { $errors->has('number') ? ' has-error' : '' }
                                            }"></p>
                                        <p> &lt;i class="fas fa-phone">&lt;/i></p>
                                        <p> &ensp;&lt;label for="number">{
                                            {__('Your Phone Number')}
                                            }&lt;/label></p>
                                        <p> &lt;input type="tel" class="form-control" name="number" placeholder="Enter Your Phone Number" value="{
                                            { $user->number }
                                            }"></p>
                                        <p> &lt;/div></p>

                                        <p> &lt;div class="form-group"></p>
                                        <p>&lt;button type="submit" class="btn btn-success">{
                                            {__('Submit')}
                                            }&lt;/button></p>
                                        <p> &lt;button type="reset" class="btn btn-warning">{
                                            {__('Reset')}
                                            }&lt;/button></p>
                                        <p> &lt;a href="{
                                            { url()->previous() }
                                            }" class="btn btn-danger">{
                                            {__('Cancel')}
                                            }&lt;/a></p>
                                        <p> &lt;/div></p>
                                        <p> @if($errors->any())</p>
                                        <p> &lt;div class="alert alert-danger"></p>
                                        <p> &lt;ul></p>
                                        <p> @foreach ($errors->all() as $error)</p>
                                        <p> &lt;li>{{ $error }}&lt;/li></p>
                                        @endforeach
                                        <p> &lt;/ul></p>
                                        <p> &lt;/div></p>

                                        <p> @endif</p>
                                        <p> &lt;/form></p>

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

                <div class="tab-pane fade" id="nav-delete" role="tabpanel" aria-labelledby="nav-delete-tab">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Date Of Birth')}}</th>
                                        <th>{{__('Phone Number')}}</th>
                                        <th>{{__('Avatar Image')}}</th>
                                        <th>{{__('Delete')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    @if($user->deleted_at == NULL)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->dob}}</td>
                                        <td>{{$user->number}}</td>
                                        <td>
                                            @if ($user->photo == NULL)
                                            <img src="{{asset('storage/user.png')}}" alt="" style="width: 300px; height: 300px;" />
                                            @else
                                            <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}" alt="Image" style="width: 300px; height: 300px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::user()->id == $user->id)

                                            @else
                                            <a href="{{ route('cheat.user.destroy', ['locale'=>app()->getLocale(),'user' => $user->id])}}" class="btn-hover">
                                                <i class="fas fa-trash" style="font-size:25px; color:red;"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @else

                                    @endif
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        {{$users->links()}}
                    </div>
                    <hr>
                    <div class="container mb-5 mt-5">
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center px-5 mb-5">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Blade view</span>

                                <div class="card-body pt-0">
                                    <p> &lt;a href="{
                                        { route('')}
                                        }" class="btn-hover"></p>
                                    <p> &lt;i class="fas fa-trash" style="font-size:25px; color:red;"> &lt;/i></p>
                                    <p> &lt;/a></p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center px-5 mb-5">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">User Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function destroy($id)</p>
                                    <p> {</p>
                                    <p> $user = $this->userRepo->destroyUser($id);</p>
                                    <p> return redirect()->back();</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center px-5 mb-5">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                                <div class="card-body pt-0">
                                    <p> public function destroyUser($id)</p>
                                    <p> {</p>
                                    <p> $user = User::findOrFail($id);</p>
                                    <p> return $this->model = $user->delete();</p>
                                    <p> }</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-restore" role="tabpanel" aria-labelledby="nav-restore-tab">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Date Of Birth')}}</th>
                                        <th>{{__('Phone Number')}}</th>
                                        <th>{{__('Avatar Image')}}</th>
                                        <th>{{__('Restore')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)

                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->dob}}</td>
                                        <td>{{$user->number}}</td>
                                        <td>
                                            @if ($user->photo == NULL)
                                            <img src="{{asset('storage/user.png')}}" alt="" style="width: 300px; height: 300px;" />
                                            @else
                                            <img src="{{asset('storage/'.$user->name.'/'.$user->photo)}}" alt="Image" style="width: 300px; height: 300px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::user()->id == $user->id)

                                            @else
                                            @if($user->deleted_at != NULL)
                                            <a href="{{ route('cheat.user.restore', ['locale'=>app()->getLocale(),'user' => $user->id])}}" class="btn-hover">
                                                <i class="fas fa-trash-alt" style="font-size:25px; color:green;"></i>
                                            </a>
                                            @else

                                            @endif
                                            @endif
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        {{$users->links()}}
                    </div>
                    <hr>
                    <div class="container mb-5 mt-5">
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center px-5 mb-5">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Blade view</span>

                                <div class="card-body pt-0">
                                    <p> &lt;a href="{
                                        { route('')}
                                        }', ['locale'=>app()->getLocale(),'user' => $user->id])}}" class="btn-hover"></p>
                                    <p> &lt;i class="fas fa-trash-alt" style="font-size:25px; color:green;"> &lt;/i></p>
                                    <p> &lt;/a></p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center px-5 mb-5">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">User Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function restore($id)</p>
                                    <p> {</p>
                                    <p> $user = $this->userRepo->restoreUser($id);</p>
                                    <p> return redirect()->back();</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center px-5 mb-5">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                                <div class="card-body pt-0">
                                    <p> public function destroyUser($id)</p>
                                    <p> {</p>
                                    <p> $user = User::withTrashed()->findorFail($id);</p>
                                    <p> return $this->model = $user->restore();</p>
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