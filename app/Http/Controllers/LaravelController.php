<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Models\CSRF;
use App\Http\Requests\StoreCSRF;
use App\Repositories\CSRF\CsrfRepositoryInterface;

class LaravelController extends Controller
{
    protected $notiRepo;
    protected $csrfRepo;
    public function __construct(CsrfRepositoryInterface $csrfRepo, NotificationRepositoryInterface $notiRepo)
    {
        $this->csrfRepo = $csrfRepo;
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

    public function installation()
    {
        if (Auth::guest()) {
            return view('LARAVEL.GettingStarted.Installation');
        } else {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('LARAVEL.GettingStarted.Installation', compact('notifications'));
        }
    }

    public function basic()
    {
        if (Auth::guest()) {
            return view('LARAVEL.TheBasics.homepage');
        } else {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('LARAVEL.TheBasics.homepage', compact('notifications'));
        }
    }

    public function route()
    {
        if (Auth::guest()) {
            return view('LARAVEL.TheBasics.Route.homepage');
        } else {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('LARAVEL.TheBasics.Route.homepage', compact('notifications'));
        }
    }

    public function thismiddleware()
    {
        if (Auth::guest()) {
            return view('LARAVEL.TheBasics.Middleware.homepage');
        } else {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('LARAVEL.TheBasics.Middleware.homepage', compact('notifications'));
        }
    }

    public function thiscsrf()
    {
        $csrfs = $this->csrfRepo->showAll();
        if (Auth::guest()) {
            return view('LARAVEL.TheBasics.CSRF.homepage');
        } else {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('LARAVEL.TheBasics.CSRF.homepage', compact('csrfs', 'notifications'));
        }
    }

    public function csrfpost(StoreCSRF $request)
    {
        $data = $request->validated();
        $csrf = new CSRF();
        $csrf->name = $data['name'];
        $csrf->save();
        return redirect()->route('laravel.csrf')->withStatus(' $csrf->name was send successfully');
    }

    public function nonecsrfpost(StoreCSRF $request)
    {

        $data = $request->validated();
        $csrf = new CSRF();
        $csrf->name = $data['name'];
        return redirect()->route('laravel.csrf')->withStatus("${$data['name']} was send successfully");;
    }

    public function controller()
    {
        if (Auth::guest()) {
            return view('LARAVEL.TheBasics.Controller.homepage');
        } else {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('LARAVEL.TheBasics.Controller.homepage', compact('notifications'));
        }
    }

    public function request()
    {
        if(Auth::guest())
        {
            return view('LARAVEL.TheBasics.Request.homepage');
        }
        else
        {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            return view('LARAVEL.TheBasics.Request.homepage',compact('notifications'));
        }
      
    }
}
