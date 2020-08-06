<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Profile\ProfileRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepo;
    protected $profileRepo;

    public function __construct(UserRepositoryInterface $userRepo, ProfileRepositoryInterface $profileRepo)

    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
        $this->profileRepo = $profileRepo;
    }
    //
    public function AnyFunction(Request $request)
    {
        return $request->user();
    }


    public function show($locale,$profile)
    {
        $user = $this->userRepo->showUser($profile);
        $profile = $this->profileRepo->getProfile($user->id);
        return view('User.profile', compact('user','profile'));
    }

    public function edit($locale,$profile)
    {
        if (Auth::user()->id != $profile) {
            return redirect()->route('profile.edit', ['name' => Auth::user()->name, 'id' => Auth::user()->id]);
        } else {
            $user = $this->userRepo->showUser($profile);
            $profile = $this->profileRepo->getProfile(Auth::user()->id);
            return view('User.edit', compact('user', 'profile'));
        }
    }

    public function confirm(StoreUser $request,$locale, $profile)
    {

        $data = $request->validated();

        $user = $this->userRepo->showUser($profile);

        $user->name = $data['name'];
        $user->number = $data['number'];
        $user->dob = $data['dob'];

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');

            $extension = $file->getClientOriginalExtension();
            $filename =   $user->name . '.' . $extension;

            $path = storage_path('app/public/' .  $user->name . '/');

            $file->move($path, $filename);

            $data['photo'] = $filename;
        }
        $user->photo = $data['photo'];


        $profile = $this->profileRepo->getProfile($profile);
        return view('User.confirm', compact('user', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$locale, $profile)
    {
       
        $data = $request;
        $user = $this->userRepo->showUser($profile);

        $user->name = $data['name'];

        $user->number = $data['number'];
        $user->dob = $data['dob'];
        $user->photo = $data['photo'];
        $user->update();

        return redirect()->route('profile.show', ['profile' => $user->id]);
    }
}
