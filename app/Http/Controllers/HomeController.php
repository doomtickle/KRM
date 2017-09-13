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
        $tasks = Task::where('assigned_to', \Auth::user()->id)->where('complete', 0)->get();
        $incompleteTasksCount = $tasks->count() > 0 ? $tasks->count() : 'No';
        return view('home', compact('clients', 'allTasks', 'tasks', 'incompleteTasksCount'));
    }
}
