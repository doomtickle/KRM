<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Carbon\Carbon;

class TaskNotesController extends Controller
{
    /**
     * TaskNotesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $notes = Note::where('task_id', $id)->get();

        foreach ($notes as $note) {
            $note->diffForHumans = Carbon::parse($note->created_at)->diffForHumans();
            $note->createdBy = User::find($note->user_id)->name;
        }

        return response()->json($notes);
    }
}
