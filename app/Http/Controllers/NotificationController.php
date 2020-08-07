<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Notification\NotificationRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    protected $notiRepo;

    public function __construct(NotificationRepositoryInterface $notiRepo) 
    {
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
    public function destroy($locale,$id)
    {
        $this->notiRepo->deleteNotification($id);

        return redirect()->back();
    }

    public function readAt($locale,$id)
    {
        $this->notiRepo->readAt($id);

        return redirect()->back();
    }

    public function readAll()
    {

        $this->notiRepo->readAll();
        return redirect()->back();
    }

    public function showAllNotifications($locale)
    {
        
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);

        return view('Notifications.lists', compact('locale','notifications'));
    }
}
