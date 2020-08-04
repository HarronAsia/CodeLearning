<?php

namespace App\Http\Controllers;


use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Profile\ProfileRepositoryInterface;

use App\Repositories\User\UserRepositoryInterface;

class ProfileController extends Controller
{

    protected $profileRepo;
    protected $userRepo;


    public function __construct(UserRepositoryInterface $userRepo, ProfileRepositoryInterface $profileRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
        $this->profileRepo = $profileRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('User.Information.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $information)
    {


        $data = $request;
        $profile = new Profile();

        $user = $this->userRepo->showUser($information);

        $profile->user_id = $user->id;
        $profile->place = $data['place'];
        $profile->job = $data['job'];
        $profile->personal_id = $data['personal_id'];
        $profile->issued_date = $data['issued_date'];
        $profile->issued_by = $data['issued_by'];
        $profile->supervisor_name = $data['supervisor_name'];
        $profile->supervisor_dob = $data['supervisor_dob'];
        $profile->detail = $data['detail'];

        $profile->save();

        return redirect()->route('account.profile', [$information]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $information
     * @return \Illuminate\Http\Response
     */
    public function show($information)
    {
        $user = $this->userRepo->showUser($information);
        $profile = $this->profileRepo->getProfile($user->id);
        return view('confirms.User.Profile.index', compact('profile', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $information
     * @return \Illuminate\Http\Response
     */
    public function edit($information)
    {

        $profile = $this->profileRepo->getProfile($information);
        if (Auth::user()->id != $profile->user_id) {
            return redirect()->route('profile.index', ['name' => Auth::user()->name, 'id' => Auth::user()->id]);
        } else {
            $user = $this->userRepo->showUser($information);
            return view('confirms.User.Profile.edit', compact('profile', 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $information)
    {
        $data = $request;
        $profile = $this->profileRepo->showProfile($information);

        $profile->place = $data['place'];
        $profile->job = $data['job'];
        $profile->personal_id = $data['personal_id'];
        $profile->issued_date = $data['issued_date'];
        $profile->issued_by = $data['issued_by'];
        $profile->supervisor_name = $data['supervisor_name'];
        $profile->supervisor_dob = $data['supervisor_dob'];
        $profile->detail = $data['detail'];
        $profile->google_plus_name = $data['google_plus_name'];
        $profile->google_plus_link = $data['google_plus_link'];
        $profile->aim_link = $data['aim_link'];
        $profile->icq_link = $data['icq_link'];
        $profile->window_live_link = $data['window_live_link'];
        $profile->yahoo_link = $data['yahoo_link'];
        $profile->skype_link = $data['skype_link'];
        $profile->google_talk_link = $data['google_talk_link'];
        $profile->facebook_link = $data['facebook_link'];
        $profile->twitter_link = $data['twitter_link'];

        $profile->update();

        return redirect()->route('account.profile', [$information]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy($information)
    {
        //
    }
}
