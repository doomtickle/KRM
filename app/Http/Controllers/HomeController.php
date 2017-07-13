<?php

namespace App\Http\Controllers;

use App\Client;
use App\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
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
        $clients = Client::latest()->get();
        $allTasks = Task::latest()->get();
        $myTasks = Task::where('assigned_to', \Auth::user()->id)->get();

        return view('home', compact('clients', 'allTasks', 'myTasks'));
    }
}
