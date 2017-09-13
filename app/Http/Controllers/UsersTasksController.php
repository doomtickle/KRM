<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class UsersTasksController extends Controller
{
    public function show($id)
    {
        $tasks = Task::with('client')->where('assigned_to', $id)->get()->sortBy('complete');

        return view('users.tasks', compact('tasks'));
    }
}
