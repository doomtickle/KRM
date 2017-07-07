@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default shadow">
                <div class="panel-heading">
                    <h3 class="panel-title">Task ID: {{ $task->id }}</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>Client: {{ $task->client->name }}</li>
                        <li>Assigned To: {{ $task->user->name }}</li>
                        <li>Due: {{ $task->due_date }}</li>
                        <li>Description: {{ $task->description }}</li>
                    </ul>
                    <div id="note-section" class="note-section">
                        <div class="alert alert-danger" role="alert" v-if="isActive">
                            <p>Whoops! Something went wrong. Did you make sure your note had a body?</p>
                        </div>
                        <form action="/note" method="post" @submit.prevent >
                            <div class="form-group">
                                {{ csrf_field() }}
                                <textarea class="form-control"
                                          rows="3"
                                          name="body"
                                          placeholder="Enter the body of the note"
                                          v-model="body">

                                </textarea>
                            </div>
                            <button class="btn btn-primary" @click="addNote(
                                            {{ $task->user->id }},
                                            {{ $task->client->id }},
                                            {{ $task->id }} )">Add Note</button>

                        </form>
                        <ul>
                            <li v-for="note in notes" v-text="note.body"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
