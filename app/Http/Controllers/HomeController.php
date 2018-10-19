<?php

namespace AdmUsers\Http\Controllers;

use Illuminate\Http\Request;
use AdmUsers\app\user;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // no es necesario que realice la autenticacion en esta vista

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
        //$users = User::select('name','email','name','anexo')->orderBy('name')->paginate(10);
        return view('home');
    }
}
