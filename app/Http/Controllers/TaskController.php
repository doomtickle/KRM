<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Client;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::latest()->with(['user', 'client'])->get()->sortBy('complete');

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createdBy = \Auth::user()->id;

        Task::create([
            'client_id' => $request->client_id,
            'assigned_to' => $request->assigned_to,
            'due_date' => $request->due_date,
            'description' => $request->description,
            'created_by' => $createdBy
        ]);

        return redirect('/home')->with('status', 'Task added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task = Task::with(['user', 'client'])->find($task->id);
        $users = User::where('id', '!=', \Auth::user()->id)->get();

        return view('tasks.show', compact('task', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $task = Task::find($task->id);
        $task->update($request->all());

        return redirect()->action('HomeController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
