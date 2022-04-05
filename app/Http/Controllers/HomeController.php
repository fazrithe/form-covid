<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TestCovid;
use Carbon\Carbon;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countUser = User::all()->count();
        $countTest = TestCovid::all()->count();
        $time = Carbon::now();
        $TestCovids = TestCovid::with('TestMethod')->limit(5)->get();
        return view('home',compact('countUser','countTest','time','TestCovids'));
    }
}
