<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Profile\ProfileRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller 
{
    protected $userRepo;
    protected $profileRepo;
    protected $notiRepo;
    public function __construct(UserRepositoryInterface $userRepo, ProfileRepositoryInterface $profileRepo, NotificationRepositoryInterface $notiRepo)

    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
        $this->profileRepo = $profileRepo;
        $this->notiRepo = $notiRepo;
    }
    //
    public function AnyFunction(Request $request)
    {
        return $request->user();
    }


    public function show($locale, $profile)
    {
        $user = $this->userRepo->showUser($profile);
        $profile = $this->profileRepo->getProfile($user->id);
    
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        return view('User.profile', compact('user', 'profile', 'notifications'));
    }

    public function edit($locale, $profile)
    {
        if (Auth::user()->id != $profile) {
            return redirect()->route('profile.edit', ['name' => Auth::user()->name, 'id' => Auth::user()->id]);
        } else {
            $user = $this->userRepo->showUser($profile);
            $profile = $this->profileRepo->getProfile(Auth::user()->id);
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('User.edit', compact('user', 'profile', 'notifications'));
        }
    }

    public function confirm(StoreUser $request, $locale, $profile)
    {

        $data = $request->validated();

        $user = $this->userRepo->showUser($profile);

        $user->name = $data['name'];
        $user->number = $data['number'];
        $user->dob = $data['dob'];
        $old_photo = $user->photo;

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');

            $extension = $file->getClientOriginalExtension();
            $filename =   $user->name . '.' . $extension;

            $path = storage_path('app/public/' .  $user->name . '/');

            if (!file_exists($path . $filename)) {

                $file->move($path, $filename);
            } else if (!file_exists($path .  $old_photo)) {

                $file->banner->move($path, $filename);
            } else {

                unlink($path .  $old_photo);
                $file->banner->move($path, $filename);
            }
            $data['photo'] = $filename;
        }
        $user->photo = $data['photo'];

        $profile = $this->profileRepo->getProfile($profile);
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        return view('User.confirm', compact('user', 'profile', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, $profile)
    {

        $data = $request;
        $user = $this->userRepo->showUser($profile);

        $user->name = $data['name'];

        $user->number = $data['number'];
        $user->dob = $data['dob'];
        $user->photo = $data['photo'];
        $user->update();

        return redirect()->route('profile.show', ['locale' => $locale, 'profile' => $user->id]);
    }

    protected $fillable = ['name'];



}
