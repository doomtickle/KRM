<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Note;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of notes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();

        return response()->json($notes);
    }

    /**
     * Store a newly created note in storage.
     *
     * @param NoteRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        $note = Note::create($request->all());
        $note->diffForHumans = Carbon::parse($note->created_at)->diffForHumans();
        $note->createdBy = User::find($note->user_id)->name;

        return response()->json($note);
    }

    /**
     * Show the form for editing the note.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the note in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the note from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return response()->json('Success');
    }
}
