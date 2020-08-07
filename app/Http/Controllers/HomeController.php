<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\Notification\NotificationRepositoryInterface;

class HomeController extends Controller
{
    protected $notiRepo;
    public function __construct(NotificationRepositoryInterface $notiRepo)
    {
        $this->notiRepo = $notiRepo;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function home()
    {
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        
        return view('HomePage', compact('notifications'));
    }

    public function laravel()
    {
        $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        return view('LARAVEL.Homepage', compact('notifications'));
    }
}
