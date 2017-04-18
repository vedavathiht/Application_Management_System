<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Workstation;
use App\Application;
use App\Appuser;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function summary()
    {
        $workstations = Workstation::count();
        $applications = Application::count();
        $appusers = Appuser::count();


        return view('summary',array('workstations' => $workstations,'applications' => $applications,'appusers' => $appusers));
    }





}
