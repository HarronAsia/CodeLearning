<?php

namespace App\Http\Controllers;

use App\Models\CSRF;
use App\Http\Requests\StoreCSRF;
use Illuminate\Http\Request;
use App\Repositories\CSRF\CsrfRepositoryInterface;

class CSRFController extends Controller
{
    protected $csrfRepo;

    public function __construct(CsrfRepositoryInterface $csrfRepo)
    {
        $this->csrfRepo = $csrfRepo;
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

    public function thiscsrf()
    {
        $csrfs = $this->csrfRepo->showAll();
        return view('LARAVEL.TheBasics.CSRF.homepage',compact('csrfs'));
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
    

}
