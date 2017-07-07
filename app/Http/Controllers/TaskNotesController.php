<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class TaskNotesController extends Controller
{
    public function index($id)
    {
        $notes = Note::where('task_id', $id)->get();

        return response()->json($notes);
    }
}
