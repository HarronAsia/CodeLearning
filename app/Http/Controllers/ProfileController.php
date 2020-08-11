<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfile;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Profile\ProfileRepositoryInterface;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;

class ProfileController extends Controller
{

    protected $profileRepo;
    protected $userRepo;
    protected $notiRepo;

    public function __construct(UserRepositoryInterface $userRepo, ProfileRepositoryInterface $profileRepo, NotificationRepositoryInterface $notiRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
        $this->profileRepo = $profileRepo;
        $this->notiRepo = $notiRepo;
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
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        return view('User.Information.add',compact('notifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfile $request, $locale)
    {


        $data = $request->validated();
        $profile = new Profile();

        $user = $this->userRepo->showUser($data['user_id']);

        $profile->user_id = $user->id;
        // $profile->place = $data['place'];
        // $profile->job = $data['job'];
        // $profile->personal_id = $data['personal_id'];
        // $profile->issued_date = $data['issued_date'];
        // $profile->issued_by = $data['issued_by'];
        // $profile->supervisor_name = $data['supervisor_name'];
        // $profile->supervisor_dob = $data['supervisor_dob'];
        // $profile->detail = $data['detail'];

        $profile->save($data);

        return redirect()->route('profile.show', ['locale' => $locale, 'profile' => $data['user_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $information
     * @return \Illuminate\Http\Response
     */
    public function show($information)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $information
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $information)
    {

        $profile = $this->profileRepo->getProfile($information);

        if (Auth::user()->id != $profile->user_id) {
            return redirect()->route('profile.show', ['locale' => $locale, 'information' => $information]);
        } else {
            $user = $this->userRepo->showUser($information);
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('User.Information.edit', compact('profile', 'user','notifications'))->with('locale', $locale);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $information
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfile $request, $locale)
    {
        $data = $request->validated();

        $profile = $this->profileRepo->showProfile(Auth::user()->id);

        // $profile->place = $data['place'];
        // $profile->job = $data['job'];
        // $profile->personal_id = $data['personal_id'];
        // $profile->issued_date = $data['issued_date'];
        // $profile->issued_by = $data['issued_by'];
        // $profile->supervisor_name = $data['supervisor_name'];
        // $profile->supervisor_dob = $data['supervisor_dob'];
        // $profile->detail = $data['detail'];
        // $profile->google_plus_name = $data['google_plus_name'];
        // $profile->google_plus_link = $data['google_plus_link'];
        // $profile->aim_link = $data['aim_link'];
        // $profile->icq_link = $data['icq_link'];
        // $profile->window_live_link = $data['window_live_link'];
        // $profile->yahoo_link = $data['yahoo_link'];
        // $profile->skype_link = $data['skype_link'];
        // $profile->google_talk_link = $data['google_talk_link'];
        // $profile->facebook_link = $data['facebook_link'];
        // $profile->twitter_link = $data['twitter_link'];

        $profile->update($data);

        return redirect()->route('profile.show', ['locale' => $locale, 'profile' => $data['user_id']]);
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
