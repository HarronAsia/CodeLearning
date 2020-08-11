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
        <div class="col-md-12 ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link" id="nav-add-tab" data-toggle="tab" href="#nav-add" role="tab" aria-controls="nav-add" aria-selected="false">{{__('Add Profile')}}</a>
                    @if(Auth::user()->profile->id??'' == Auth::user()->id)
                    <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false">{{__('Edit Profile')}}</a>
                    @else

                    @endif
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">
                    <div class="row">
                        <div class="col-md-8" >
                            <form action="{{ route('cheat.profile.store',app()->getLocale())}} " method="POST" enctype="multipart/form-data" id="editprofile">
                                @csrf
                                <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                                <div class="form-group">
                                    <i class="fas fa-search-location"></i> &ensp;<label for="place">{{__('Your Place')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('place') ? ' has-error' : '' }}" name="place" placeholder="{{__('Enter Your Place')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-briefcase"></i> &ensp;<label for="job">{{__('Your Job')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('job') ? ' has-error' : '' }}" name="job" placeholder="{{__('Enter Your Job')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-id-card"></i>&ensp;<label for="personal_id">{{__('Your Personal ID')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('personal_id') ? ' has-error' : '' }}" name="personal_id" placeholder="{{__('Enter Your Personal ID')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-calendar"></i>&ensp;<label for="issued_date">{{__('Your Issued Date')}}</label>
                                    <input type="date" class="form-control has-feedback{{ $errors->has('issued_date') ? ' has-error' : '' }}" name="issued_date" placeholder="{{__('Enter Your Issued Date')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-search-location"></i>&ensp;<label for="issued_by">{{__('Your Issued By')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('issued_by') ? ' has-error' : '' }}" name="issued_by" placeholder="{{__('Enter Your Issued By')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-user-lock"></i>&ensp;<label for="supervisor_name">{{__('Your Supervisor(Optional if you are under 14)')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('supervisor_name') ? ' has-error' : '' }}" name="supervisor_name" placeholder="{{__('Enter Your Supervisor Name')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-calendar"></i>&ensp;<label for="supervisor_dob">{{__('Your Supervisor Date Of Birth(Optional if you are under 14)')}}</label>
                                    <input type="date" class="form-control has-feedback{{ $errors->has('supervisor_dob') ? ' has-error' : '' }}" name="supervisor_dob" placeholder="{{__('Enter Your Supervisor Dob')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-google-plus-g"></i>&ensp;<label for="google_plus_name">{{__('Your Google Plus Name')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('google_plus_name') ? ' has-error' : '' }}" name="google_plus_name" placeholder="{{__('Enter Your Google Plus Name')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-google-plus-g"></i>&ensp;<label for="google_plus_link">{{__('Your Google Plus Link')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('google_plus_link') ? ' has-error' : '' }}" name="google_plus_link" placeholder="{{__('Enter Your Google Plus Link')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-crosshairs"></i>&ensp;<label for="aim_link">{{__('Your AIM link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('aim_link') ? ' has-error' : '' }}" name="aim_link" placeholder="{{__('Enter Your AIM link')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-windows"></i>&ensp;<label for="window_live_link">{{__('Your Window Live link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('window_live_link') ? ' has-error' : '' }}" name="window_live_link" placeholder="{{__('Enter Window Live link')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-yahoo"></i>&ensp;<label for="yahoo_link">{{__('Your Yahoo link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('yahoo_link') ? ' has-error' : '' }}" name="yahoo_link" placeholder="{{__('Enter Yahoo link')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-phone"></i>&ensp;<label for="icq_link">{{__('Your ICQ link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('icq_link') ? ' has-error' : '' }}" name="icq_link" placeholder="{{__('Enter ICQ link')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-skype"></i>&ensp;<label for="skype_link">{{__('Your Skype link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('skype_link') ? ' has-error' : '' }}" name="skype_link" placeholder="{{__('Enter Skype link')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-google"></i>&ensp;<label for="google_talk_link">{{__('Your Google Talk link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('google_talk_link') ? ' has-error' : '' }}" name="google_talk_link" placeholder="{{__('Enter Google Talk link')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-facebook-f"></i>&ensp;<label for="facebook_link">{{__('Your Facebook link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('facebook_link') ? ' has-error' : '' }}" name="facebook_link" placeholder="{{__('Enter Facebook link')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-twitter"></i>&ensp;<label for="twitter_link">{{__('Your Twitter link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('twitter_link') ? ' has-error' : '' }}" name="twitter_link" placeholder="{{__('Enter Twitter link')}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-info"></i>&ensp;<label for="detail">{{__('Your Detail')}} </label> <br>
                                    <textarea name="detail" id="detail has-feedback{{ $errors->has('detail') ? ' has-error' : '' }}" cols="96" rows="20" placeholder="{{__('Enter Your Bio Detail')}}"></textarea>
                                </div>
                                @if(Auth::user()->profile->id??'' == Auth::user()->id)

                                @else
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">{{__('Submit')}}</button>
                                    <button type="reset" class="btn btn-warning">{{__('Reset')}}</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger">{{__('Cancel')}}</a>
                                </div>
                                @endif
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <i class="fas fa-search-location"></i> &ensp;<label for="place">{{__('Your Place')}}</label>
                                <p>{{Auth::user()->profile->place??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-briefcase"></i> &ensp;<label for="job">{{__('Your Job')}}</label>
                                <p>{{Auth::user()->profile->job??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-id-card"></i>&ensp;<label for="personal_id">{{__('Your Personal ID')}}</label>
                                <p>{{Auth::user()->profile->personal_id??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-calendar"></i>&ensp;<label for="issued_date">{{__('Your Issued Date')}}</label>
                                <p>{{Auth::user()->profile->issued_date??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-search-location"></i>&ensp;<label for="issued_by">{{__('Your Issued By')}}</label>
                                <p>{{Auth::user()->profile->issued_by??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-user-lock"></i>&ensp;<label for="supervisor_name">{{__('Your Supervisor(Optional if you are under 14)')}}</label>
                                <p>{{Auth::user()->profile->supervisor_name??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-calendar"></i>&ensp;<label for="supervisor_dob">{{__('Your Supervisor Date Of Birth(Optional if you are under 14)')}}</label>
                                <p>{{Auth::user()->profile->supervisor_dob??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-google-plus-g"></i>&ensp;<label for="google_plus_name">{{__('Your Google Plus Name')}}</label>
                                <p>{{Auth::user()->profile->google_plus_name??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-google-plus-g"></i>&ensp;<label for="google_plus_link">{{__('Your Google Plus Link')}}</label>
                                <p>{{Auth::user()->profile->google_plus_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-crosshairs"></i>&ensp;<label for="aim_link">{{__('Your AIM link')}} </label>
                                <p>{{Auth::user()->profile->aim_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-windows"></i>&ensp;<label for="window_live_link">{{__('Your Window Live link')}} </label>
                                <p>{{Auth::user()->profile->window_live_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-yahoo"></i>&ensp;<label for="yahoo_link">{{__('Your Yahoo link')}} </label>
                                <p>{{Auth::user()->profile->yahoo_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-phone"></i>&ensp;<label for="icq_link">{{__('Your ICQ link')}} </label>
                                <p>{{Auth::user()->profile->icq_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-skype"></i>&ensp;<label for="skype_link">{{__('Your Skype link')}} </label>
                                <p>{{Auth::user()->profile->skype_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-google"></i>&ensp;<label for="google_talk_link">{{__('Your Google Talk link')}} </label>
                                <p>{{Auth::user()->profile->google_talk_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-facebook-f"></i>&ensp;<label for="facebook_link">{{__('Your Facebook link')}} </label>
                                <p>{{Auth::user()->profile->facebook_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-twitter"></i>&ensp;<label for="twitter_link">{{__('Your Twitter link')}} </label>
                                <p>{{Auth::user()->profile->twitter_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-info"></i>&ensp;<label for="detail">{{__('Your Detail')}} </label> <br>
                                <p>{{Auth::user()->profile->detail??''}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Form Add Profile</span>

                                <p>&lt;div class="card-body pt-0"> </p>
                                <p> &lt;form action="{
                                    { route('')}
                                    } " method="POST" enctype="multipart/form-data" id="editprofile"></p>
                                <p> @
                                    csrf</p>
                                <p> &lt;input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}"></p>
                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-search-location">&lt;/i> &ensp;&lt;label for="place">{{__('Your Place')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('place') ? ' has-error' : '' }}" name="place" placeholder="{{__('Enter Your Place')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-briefcase">&lt;/i> &ensp;&lt;label for="job">{{__('Your Job')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('job') ? ' has-error' : '' }}" name="job" placeholder="{{__('Enter Your Job')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-id-card">&lt;/i>&ensp;&lt;label for="personal_id">{{__('Your Personal ID')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('personal_id') ? ' has-error' : '' }}" name="personal_id" placeholder="{{__('Enter Your Personal ID')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-calendar">&lt;/i>&ensp;&lt;label for="issued_date">{{__('Your Issued Date')}}&lt;/label></p>
                                <p> &lt;nput type="date" class="form-control has-feedback{{ $errors->has('issued_date') ? ' has-error' : '' }}" name="issued_date" placeholder="{{__('Enter Your Issued Date')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-search-location">&lt;/i>&ensp;&lt;label for="issued_by">{{__('Your Issued By')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('issued_by') ? ' has-error' : '' }}" name="issued_by" placeholder="{{__('Enter Your Issued By')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-user-lock">&lt;/i>&ensp;&lt;label for="supervisor_name">{{__('Your Supervisor(Optional if you are under 14)')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('supervisor_name') ? ' has-error' : '' }}" name="supervisor_name" placeholder="{{__('Enter Your Supervisor Name')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-calendar">&lt;/i>&ensp;&lt;label for="supervisor_dob">{{__('Your Supervisor Date Of Birth(Optional if you are under 14)')}}&lt;/label></p>
                                <p> &lt;input type="date" class="form-control has-feedback{{ $errors->has('supervisor_dob') ? ' has-error' : '' }}" name="supervisor_dob" placeholder="{{__('Enter Your Supervisor Dob')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fab fa-google-plus-g">&lt;/i>&ensp;&lt;label for="google_plus_name">{{__('Your Google Plus Name')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('google_plus_name') ? ' has-error' : '' }}" name="google_plus_name" placeholder="{{__('Enter Your Google Plus Name')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fab fa-google-plus-g">&lt;/i>&ensp;&lt;label for="google_plus_link">{{__('Your Google Plus Link')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('google_plus_link') ? ' has-error' : '' }}" name="google_plus_link" placeholder="{{__('Enter Your Google Plus Link')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-crosshairs">&lt;/i>&ensp;<label for="aim_link">{{__('Your AIM link')}} &lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('aim_link') ? ' has-error' : '' }}" name="aim_link" placeholder="{{__('Enter Your AIM link')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fab fa-windows">&lt;/i>&ensp;&lt;label for="window_live_link">{{__('Your Window Live link')}} &lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('window_live_link') ? ' has-error' : '' }}" name="window_live_link" placeholder="{{__('Enter Window Live link')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fab fa-yahoo">&lt;/i>&ensp;&lt;label for="yahoo_link">{{__('Your Yahoo link')}} &lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('yahoo_link') ? ' has-error' : '' }}" name="yahoo_link" placeholder="{{__('Enter Yahoo link')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-phone">&lt;/i>&ensp;&lt;label for="icq_link">{{__('Your ICQ link')}} &lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('icq_link') ? ' has-error' : '' }}" name="icq_link" placeholder="{{__('Enter ICQ link')}}"></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fab fa-skype">&lt;/i>&ensp;<label for="skype_link">{{__('Your Skype link')}} &lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('skype_link') ? ' has-error' : '' }}" name="skype_link" placeholder="{{__('Enter Skype link')}}">
                                    <p> &lt;/div></p>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;i class="fab fa-google">&lt;/i>&ensp;&lt;label for="google_talk_link">{{__('Your Google Talk link')}} &lt;/label></p>
                                    <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('google_talk_link') ? ' has-error' : '' }}" name="google_talk_link" placeholder="{{__('Enter Google Talk link')}}"></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;i class="fab fa-facebook-f">&lt;/i>&ensp;&lt;label for="facebook_link">{{__('Your Facebook link')}} &lt;/label></p>
                                    <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('facebook_link') ? ' has-error' : '' }}" name="facebook_link" placeholder="{{__('Enter Facebook link')}}"></p>
                                    &lt;/div>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;i class="fab fa-twitter">&lt;/i>&ensp;&lt;label for="twitter_link">{{__('Your Twitter link')}} &lt;/label></p>
                                    <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('twitter_link') ? ' has-error' : '' }}" name="twitter_link" placeholder="{{__('Enter Twitter link')}}"></p>
                                    &lt;/div>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;i class="fas fa-info">&lt;/i>&ensp;&lt;label for="detail">{{__('Your Detail')}} &lt;/label> &lt;br></p>
                                    <p> &lt;textarea name="detail" id="detail has-feedback{{ $errors->has('detail') ? ' has-error' : '' }}" cols="96" rows="20" placeholder="{{__('Enter Your Bio Detail')}}">&lt;/textarea></p>
                                    <p> &lt;/div></p>
                                    <p> @
                                        if(Auth::user()->profile->id??'' == Auth::user()->id)</p>

                                    <p> @
                                        else</p>
                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;button type="submit" class="btn btn-success">{{__('Submit')}}&lt;/button></p>
                                    <p> &lt;button type="reset" class="btn btn-warning">{{__('Reset')}}&lt;/button></p>
                                    <p> &lt;a href="{
                                        { url()->previous() }
                                        }" class="btn btn-danger">{{__('Cancel')}}&lt;/a></p>
                                    <p> &lt;/div></p>
                                    <p> @
                                        endif</p>
                                    <p> @
                                        if ($errors->any())</p>
                                    <p> &lt;div class="alert alert-danger"></p>
                                    <p> &lt;ul></p>
                                    <p>@
                                        foreach ($errors->all() as $error)</p>
                                    <p> &lt;li>{
                                        { $error }
                                        }&lt;/li></p>
                                    <p>@
                                        endforeach</p>
                                    <p> &lt;/ul></p>
                                    <p> &lt;/div></p>

                                    <p> @
                                        endif</p>
                                    <p> &lt;/form></p>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Profile Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function store(StoreProfile $request, $locale)</p>
                                    <p> {</p>


                                    <p> $data = $request->validated();</p>
                                    <p> $profile = new Profile();</p>

                                    <p> $user = $this->userRepo->showUser($data['user_id']);</p>

                                    <p> $profile->user_id = $user->id;</p>

                                    <p> $profile->save($data);</p>

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
                                    <p> 'user_id' => 'required',</p>
                                    <p> 'place' => '',</p>
                                    <p> 'job' => '',</p>
                                    <p> 'personal_id' => '',</p>
                                    <p> 'issued_date' => '',</p>
                                    <p> 'issued_by' => '',</p>
                                    <p> 'supervisor_name' => '',</p>
                                    <p> 'supervisor_dob' => '',</p>
                                    <p> 'detail' => '',</p>
                                    <p> 'google_plus_name' => '',</p>
                                    <p> 'google_plus_link' => '',</p>
                                    <p>'aim_link' => '',</p>
                                    <p> 'window_live_link' => '',</p>
                                    <p> 'yahoo_link' => '',</p>
                                    <p> 'icq_link' => '',</p>
                                    <p> 'skype_link' => '',</p>
                                    <p> 'google_talk_link' => '',</p>
                                    <p>'facebook_link' => '',</p>
                                    <p> 'twitter_link' => '',</p>
                                    <p> ];</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                                <div class="card-body pt-0">
                                    <p> public function showProfile($id)</p>
                                    <p> {</p>
                                    <p> return $this->model = Profile::findOrFail($id);</p>
                                    <p> }</p>
                                </div>
                            </div>
                        </div>

                </div>

                @if(Auth::user()->profile->id??'' == Auth::user()->id)
                <div class="tab-pane fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('cheat.profile.update',['locale'=>app()->getLocale(),'profile'=>Auth::user()->profile->id??''])}} " method="POST" enctype="multipart/form-data" id="editprofile">
                                @csrf

                                <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                                <div class="form-group">
                                    <i class="fas fa-search-location"></i> &ensp;<label for="place">{{__('Your Place')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('place') ? ' has-error' : '' }}" name="place" placeholder="{{__('Enter Your Place')}}" value="{{Auth::user()->profile->place?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-briefcase"></i> &ensp;<label for="job">{{__('Your Job')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('job') ? ' has-error' : '' }}" name="job" placeholder="{{__('Enter Your Job')}}" value="{{Auth::user()->profile->job?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-id-card"></i>&ensp;<label for="personal_id">{{__('Your Personal ID')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('personal_id') ? ' has-error' : '' }}" name="personal_id" placeholder="{{__('Enter Your Personal ID')}}" value="{{Auth::user()->profile->personal_id?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-calendar"></i>&ensp;<label for="issued_date">{{__('Your Issued Date')}}</label>
                                    <input type="date" class="form-control has-feedback{{ $errors->has('issued_date') ? ' has-error' : '' }}" name="issued_date" placeholder="{{__('Enter Your Issued Date')}}" value="{{Auth::user()->profile->issued_date?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-search-location"></i>&ensp;<label for="issued_by">{{__('Your Issued By')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('issued_by') ? ' has-error' : '' }}" name="issued_by" placeholder="{{__('Enter Your Issued By')}}" value="{{Auth::user()->profile->issued_by?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-user-lock"></i>&ensp;<label for="supervisor_name">{{__('Your Supervisor(Optional if you are under 14)')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('supervisor_name') ? ' has-error' : '' }}" name="supervisor_name" placeholder="{{__('Enter Your Supervisor Name')}}" value="{{Auth::user()->profile->supervisor_name?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-calendar"></i>&ensp;<label for="supervisor_dob">{{__('Your Supervisor Date Of Birth(Optional if you are under 14)')}}</label>
                                    <input type="date" class="form-control has-feedback{{ $errors->has('supervisor_dob') ? ' has-error' : '' }}" name="supervisor_dob" placeholder="{{__('Enter Your Supervisor Dob')}}" value="{{Auth::user()->profile->supervisor_dob?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-google-plus-g"></i>&ensp;<label for="google_plus_name">{{__('Your Google Plus Name')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('google_plus_name') ? ' has-error' : '' }}" name="google_plus_name" placeholder="{{__('Enter Your Google Plus Name')}}" value="{{Auth::user()->profile->google_plus_name?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-google-plus-g"></i>&ensp;<label for="google_plus_link">{{__('Your Google Plus Link')}}</label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('google_plus_link') ? ' has-error' : '' }}" name="google_plus_link" placeholder="{{__('Enter Your Google Plus Link')}}" value="{{Auth::user()->profile->google_plus_link?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-crosshairs"></i>&ensp;<label for="aim_link">{{__('Your AIM link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('aim_link') ? ' has-error' : '' }}" name="aim_link" placeholder="{{__('Enter Your AIM link')}}" value="{{Auth::user()->profile->aim_link?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-windows"></i>&ensp;<label for="window_live_link">{{__('Your Window Live link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('window_live_link') ? ' has-error' : '' }}" name="window_live_link" placeholder="{{__('Enter Window Live link')}}" value="{{Auth::user()->profile->window_live_link?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-yahoo"></i>&ensp;<label for="yahoo_link">{{__('Your Yahoo link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('yahoo_link') ? ' has-error' : '' }}" name="yahoo_link" placeholder="{{__('Enter Yahoo link')}}" value="{{Auth::user()->profile->yahoo_link?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-phone"></i>&ensp;<label for="icq_link">{{__('Your ICQ link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('icq_link') ? ' has-error' : '' }}" name="icq_link" placeholder="{{__('Enter ICQ link')}}" value="{{Auth::user()->profile->icq_link?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-skype"></i>&ensp;<label for="skype_link">{{__('Your Skype link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('skype_link') ? ' has-error' : '' }}" name="skype_link" placeholder="{{__('Enter Skype link')}}" value="{{Auth::user()->profile->skype_link?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-google"></i>&ensp;<label for="google_talk_link">{{__('Your Google Talk link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('google_talk_link') ? ' has-error' : '' }}" name="google_talk_link" placeholder="{{__('Enter Google Talk link')}}" value="{{Auth::user()->profile->google_talk_link?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-facebook-f"></i>&ensp;<label for="facebook_link">{{__('Your Facebook link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('facebook_link') ? ' has-error' : '' }}" name="facebook_link" placeholder="{{__('Enter Facebook link')}}" value="{{Auth::user()->profile->facebook_link?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fab fa-twitter"></i>&ensp;<label for="twitter_link">{{__('Your Twitter link')}} </label>
                                    <input type="text" class="form-control has-feedback{{ $errors->has('twitter_link') ? ' has-error' : '' }}" name="twitter_link" placeholder="{{__('Enter Twitter link')}}" value="{{Auth::user()->profile->twitter_link?? ''}}">
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-info"></i>&ensp;<label for="detail">{{__('Your Detail')}} </label> <br>
                                    <textarea class="form-control has-feedback{{ $errors->has('detail') ? ' has-error' : '' }}" name="detail" id="detail" cols="96" rows="20" placeholder="{{__('Enter Your Bio Detail')}}">{{Auth::user()->profile->detail?? ''}}</textarea>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-search-location"></i> &ensp;<label for="place">{{__('Your Place')}}</label>
                                <p>{{Auth::user()->profile->place??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-briefcase"></i> &ensp;<label for="job">{{__('Your Job')}}</label>
                                <p>{{Auth::user()->profile->job??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-id-card"></i>&ensp;<label for="personal_id">{{__('Your Personal ID')}}</label>
                                <p>{{Auth::user()->profile->personal_id??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-calendar"></i>&ensp;<label for="issued_date">{{__('Your Issued Date')}}</label>
                                <p>{{Auth::user()->profile->issued_date??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-search-location"></i>&ensp;<label for="issued_by">{{__('Your Issued By')}}</label>
                                <p>{{Auth::user()->profile->issued_by??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-user-lock"></i>&ensp;<label for="supervisor_name">{{__('Your Supervisor(Optional if you are under 14)')}}</label>
                                <p>{{Auth::user()->profile->supervisor_name??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-calendar"></i>&ensp;<label for="supervisor_dob">{{__('Your Supervisor Date Of Birth(Optional if you are under 14)')}}</label>
                                <p>{{Auth::user()->profile->supervisor_dob??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-google-plus-g"></i>&ensp;<label for="google_plus_name">{{__('Your Google Plus Name')}}</label>
                                <p>{{Auth::user()->profile->google_plus_name??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-google-plus-g"></i>&ensp;<label for="google_plus_link">{{__('Your Google Plus Link')}}</label>
                                <p>{{Auth::user()->profile->google_plus_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-crosshairs"></i>&ensp;<label for="aim_link">{{__('Your AIM link')}} </label>
                                <p>{{Auth::user()->profile->aim_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-windows"></i>&ensp;<label for="window_live_link">{{__('Your Window Live link')}} </label>
                                <p>{{Auth::user()->profile->window_live_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-yahoo"></i>&ensp;<label for="yahoo_link">{{__('Your Yahoo link')}} </label>
                                <p>{{Auth::user()->profile->yahoo_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fas fa-phone"></i>&ensp;<label for="icq_link">{{__('Your ICQ link')}} </label>
                                <p>{{Auth::user()->profile->icq_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-skype"></i>&ensp;<label for="skype_link">{{__('Your Skype link')}} </label>
                                <p>{{Auth::user()->profile->skype_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-google"></i>&ensp;<label for="google_talk_link">{{__('Your Google Talk link')}} </label>
                                <p>{{Auth::user()->profile->google_talk_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-facebook-f"></i>&ensp;<label for="facebook_link">{{__('Your Facebook link')}} </label>
                                <p>{{Auth::user()->profile->facebook_link??''}}</p>
                            </div>

                            <div class="form-group">
                                <i class="fab fa-twitter"></i>&ensp;<label for="twitter_link">{{__('Your Twitter link')}} </label>
                                <p>{{Auth::user()->profile->twitter_link??''}}</p>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-info"></i>&ensp;<label for="detail">{{__('Your Detail')}} </label> <br>
                                <p>{{Auth::user()->profile->detail??''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="container mb-5 mt-5">
                        <div class="pricing card-deck flex-column flex-md-row mb-3">
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Form Edit Profile</span>

                                <p>&lt;div class="card-body pt-0"> </p>
                                <p> &lt;form action="{
                                    { route('')}
                                    } " method="POST" enctype="multipart/form-data" id="editprofile"></p>
                                <p> @
                                    csrf</p>
                                <p> &lt;input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}"></p>
                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-search-location">&lt;/i> &ensp;&lt;label for="place">{{__('Your Place')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('place') ? ' has-error' : '' }}" name="place" placeholder="{{__('Enter Your Place')}}" value="{
                                    {Auth::user()->profile->place?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-briefcase">&lt;/i> &ensp;&lt;label for="job">{{__('Your Job')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('job') ? ' has-error' : '' }}" name="job" placeholder="{{__('Enter Your Job')}}" value="{
                                    {Auth::user()->profile->job?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-id-card">&lt;/i>&ensp;&lt;label for="personal_id">{{__('Your Personal ID')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('personal_id') ? ' has-error' : '' }}" name="personal_id" placeholder="{{__('Enter Your Personal ID')}}" value="{
                                    {Auth::user()->profile->personal_id?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-calendar">&lt;/i>&ensp;&lt;label for="issued_date">{{__('Your Issued Date')}}&lt;/label></p>
                                <p> &lt;nput type="date" class="form-control has-feedback{{ $errors->has('issued_date') ? ' has-error' : '' }}" name="issued_date" placeholder="{{__('Enter Your Issued Date')}}" value="{
                                    {Auth::user()->profile->issued_date?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-search-location">&lt;/i>&ensp;&lt;label for="issued_by">{{__('Your Issued By')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('issued_by') ? ' has-error' : '' }}" name="issued_by" placeholder="{{__('Enter Your Issued By')}}" value="{
                                    {Auth::user()->profile->issued_by?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-user-lock">&lt;/i>&ensp;&lt;label for="supervisor_name">{{__('Your Supervisor(Optional if you are under 14)')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('supervisor_name') ? ' has-error' : '' }}" name="supervisor_name" placeholder="{{__('Enter Your Supervisor Name')}}" value="{
                                    {Auth::user()->profile->supervisor_name?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-calendar">&lt;/i>&ensp;&lt;label for="supervisor_dob">{{__('Your Supervisor Date Of Birth(Optional if you are under 14)')}}&lt;/label></p>
                                <p> &lt;input type="date" class="form-control has-feedback{{ $errors->has('supervisor_dob') ? ' has-error' : '' }}" name="supervisor_dob" placeholder="{{__('Enter Your Supervisor Dob')}}" value="{
                                    {Auth::user()->profile->supervisor_dob?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fab fa-google-plus-g">&lt;/i>&ensp;&lt;label for="google_plus_name">{{__('Your Google Plus Name')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('google_plus_name') ? ' has-error' : '' }}" name="google_plus_name" placeholder="{{__('Enter Your Google Plus Name')}}" value="{
                                    {Auth::user()->profile->google_plus_name?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fab fa-google-plus-g">&lt;/i>&ensp;&lt;label for="google_plus_link">{{__('Your Google Plus Link')}}&lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('google_plus_link') ? ' has-error' : '' }}" name="google_plus_link" placeholder="{{__('Enter Your Google Plus Link')}}" value="{
                                    {Auth::user()->profile->google_plus_link?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-crosshairs">&lt;/i>&ensp;<label for="aim_link">{{__('Your AIM link')}} &lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('aim_link') ? ' has-error' : '' }}" name="aim_link" placeholder="{{__('Enter Your AIM link')}}" value="{
                                    {Auth::user()->profile->aim_link?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fab fa-windows">&lt;/i>&ensp;&lt;label for="window_live_link">{{__('Your Window Live link')}} &lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('window_live_link') ? ' has-error' : '' }}" name="window_live_link" placeholder="{{__('Enter Window Live link')}}" value="{
                                    {Auth::user()->profile->window_live_link?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fab fa-yahoo">&lt;/i>&ensp;&lt;label for="yahoo_link">{{__('Your Yahoo link')}} &lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('yahoo_link') ? ' has-error' : '' }}" name="yahoo_link" placeholder="{{__('Enter Yahoo link')}}" value="{
                                    {Auth::user()->profile->yahoo_link?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fas fa-phone">&lt;/i>&ensp;&lt;label for="icq_link">{{__('Your ICQ link')}} &lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('icq_link') ? ' has-error' : '' }}" name="icq_link" placeholder="{{__('Enter ICQ link')}}" value="{
                                    {Auth::user()->profile->icq_link?? ''}
                                    }></p>
                                <p> &lt;/div></p>

                                <p> &lt;div class="form-group"></p>
                                <p> &lt;i class="fab fa-skype">&lt;/i>&ensp;<label for="skype_link">{{__('Your Skype link')}} &lt;/label></p>
                                <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('skype_link') ? ' has-error' : '' }}" name="skype_link" placeholder="{{__('Enter Skype link')}}" value="{
                                    {Auth::user()->profile->skype_link?? ''}
                                    }>
                                    <p> &lt;/div></p>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;i class="fab fa-google">&lt;/i>&ensp;&lt;label for="google_talk_link">{{__('Your Google Talk link')}} &lt;/label></p>
                                    <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('google_talk_link') ? ' has-error' : '' }}" name="google_talk_link" placeholder="{{__('Enter Google Talk link')}}" value="{
                                        {Auth::user()->profile->google_talk_link?? ''}
                                        }></p>
                                    <p> &lt;/div></p>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;i class="fab fa-facebook-f">&lt;/i>&ensp;&lt;label for="facebook_link">{{__('Your Facebook link')}} &lt;/label></p>
                                    <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('facebook_link') ? ' has-error' : '' }}" name="facebook_link" placeholder="{{__('Enter Facebook link')}}" value="{
                                        {Auth::user()->profile->facebook_link?? ''}
                                        }></p>
                                    &lt;/div>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;i class="fab fa-twitter">&lt;/i>&ensp;&lt;label for="twitter_link">{{__('Your Twitter link')}} &lt;/label></p>
                                    <p> &lt;input type="text" class="form-control has-feedback{{ $errors->has('twitter_link') ? ' has-error' : '' }}" name="twitter_link" placeholder="{{__('Enter Twitter link')}}" value="{
                                        {Auth::user()->profile->twitter_link?? ''}
                                        }></p>
                                    &lt;/div>

                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;i class="fas fa-info">&lt;/i>&ensp;&lt;label for="detail">{{__('Your Detail')}} &lt;/label> &lt;br></p>
                                    <p> &lt;textarea name="detail" id="detail has-feedback{{ $errors->has('detail') ? ' has-error' : '' }}" cols="96" rows="20" placeholder="{{__('Enter Your Bio Detail')}}">{
                                        {Auth::user()->profile->detail?? ''}
                                        }&lt;/textarea></p>
                                    <p> &lt;/div></p>
                                    <p> @
                                        if(Auth::user()->profile->id??'' == Auth::user()->id)</p>

                                    <p> @
                                        else</p>
                                    <p> &lt;div class="form-group"></p>
                                    <p> &lt;button type="submit" class="btn btn-success">{{__('Submit')}}&lt;/button></p>
                                    <p> &lt;button type="reset" class="btn btn-warning">{{__('Reset')}}&lt;/button></p>
                                    <p> &lt;a href="{
                                        { url()->previous() }
                                        }" class="btn btn-danger">{{__('Cancel')}}&lt;/a></p>
                                    <p> &lt;/div></p>
                                    <p> @
                                        endif</p>
                                    <p> @
                                        if ($errors->any())</p>
                                    <p> &lt;div class="alert alert-danger"></p>
                                    <p> &lt;ul></p>
                                    <p>@
                                        foreach ($errors->all() as $error)</p>
                                    <p> &lt;li>{
                                        { $error }
                                        }&lt;/li></p>
                                    <p>@
                                        endforeach</p>
                                    <p> &lt;/ul></p>
                                    <p> &lt;/div></p>

                                    <p> @
                                        endif</p>
                                    <p> &lt;/form></p>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Profile Controller</span>
                                <div class="card-body pt-0">
                                    <p> public function update(StoreProfile $request, $locale)</p>
                                    <p> {</p>
                                    <p> $data = $request->validated();</p>

                                    <p> $profile = $this->profileRepo->showProfile(Auth::user()->id);</p>

                                    <p> // $profile->place = $data['place'];</p>
                                    <p> // $profile->job = $data['job'];</p>
                                    <p> // $profile->personal_id = $data['personal_id'];</p>
                                    <p> // $profile->issued_date = $data['issued_date'];</p>
                                    <p> // $profile->issued_by = $data['issued_by'];</p>
                                    <p> // $profile->supervisor_name = $data['supervisor_name'];</p>
                                    <p> // $profile->supervisor_dob = $data['supervisor_dob'];</p>
                                    <p> // $profile->detail = $data['detail'];</p>
                                    <p> // $profile->google_plus_name = $data['google_plus_name'];</p>
                                    <p> // $profile->google_plus_link = $data['google_plus_link'];</p>
                                    <p> // $profile->aim_link = $data['aim_link'];</p>
                                    <p> // $profile->icq_link = $data['icq_link'];</p>
                                    <p>// $profile->window_live_link = $data['window_live_link'];</p>
                                    <p> // $profile->yahoo_link = $data['yahoo_link'];</p>
                                    <p>// $profile->skype_link = $data['skype_link'];</p>
                                    <p> // $profile->google_talk_link = $data['google_talk_link'];</p>
                                    <p> // $profile->facebook_link = $data['facebook_link'];</p>
                                    <p> // $profile->twitter_link = $data['twitter_link'];</p>

                                    <p> $profile->update($data);</p>

                                    <p> return redirect()->route('']);</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Request</span>
                                <div class="card-body pt-0">
                                    <p> public function rules()</p>
                                    <p> {</p>
                                    <p> return [</p>
                                    <p> 'user_id' => 'required',</p>
                                    <p> 'place' => '',</p>
                                    <p> 'job' => '',</p>
                                    <p> 'personal_id' => '',</p>
                                    <p> 'issued_date' => '',</p>
                                    <p> 'issued_by' => '',</p>
                                    <p> 'supervisor_name' => '',</p>
                                    <p> 'supervisor_dob' => '',</p>
                                    <p> 'detail' => '',</p>
                                    <p> 'google_plus_name' => '',</p>
                                    <p> 'google_plus_link' => '',</p>
                                    <p>'aim_link' => '',</p>
                                    <p> 'window_live_link' => '',</p>
                                    <p> 'yahoo_link' => '',</p>
                                    <p> 'icq_link' => '',</p>
                                    <p> 'skype_link' => '',</p>
                                    <p> 'google_talk_link' => '',</p>
                                    <p>'facebook_link' => '',</p>
                                    <p> 'twitter_link' => '',</p>
                                    <p> ];</p>
                                    <p> }</p>
                                </div>
                            </div>
                            <div class="card card-pricing text-center  px-12 mb-12">
                                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Repository</span>
                                <div class="card-body pt-0">
                                    <p> public function showProfile($id)</p>
                                    <p> {</p>
                                    <p> return $this->model = Profile::findOrFail($id);</p>
                                    <p> }</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @else

            @endif
        </div>
    </div>

</div>



@endsection