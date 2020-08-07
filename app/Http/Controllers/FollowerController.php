<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Notifications\Community\GetFollowCommunityNotficationForUser;
use App\Notifications\Community\GetunFollowCommunityNotficationForUser;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Community\CommunityRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;

class FollowerController extends Controller
{

    protected $commuRepo;
    protected $userRepo;
    protected $notiRepo;
    public function __construct(CommunityRepositoryInterface $commuRepo, UserRepositoryInterface $userRepo, NotificationRepositoryInterface $notiRepo)
    {
        $this->commuRepo = $commuRepo;
        $this->userRepo = $userRepo;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function follow($locale, $community, $user)
    {

        $community = $this->commuRepo->showcommunity($community);

        $user = $this->userRepo->showUser($user);

        $user->following()->attach($community);
        $community->notify(new GetFollowCommunityNotficationForUser());
        $this->notiRepo->updateUserId(Auth::user()->id, $community->id);
        return redirect()->back();
    }

    public function unfollow($locale, $community, $userid)
    {

        $community = $this->commuRepo->showcommunity($community);
        $user = $this->userRepo->showUser($userid);

        $user->following()->detach($community);
        $community->notify(new GetunFollowCommunityNotficationForUser());
        $this->notiRepo->updateUserId(Auth::user()->id, $community->id);
        return redirect()->back();
    }
}
