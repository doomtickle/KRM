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
                        <form action="/note" method="post" @submit.prevent>
                            <div class="form-group">
                                {{ csrf_field() }}
                                {{--<input type="hidden" name="task_id" value="{{ $task->id }}" v-model="task_id">--}}
                                {{--<input type="hidden" name="client_id" value="{{ $task->client->id }}" v-model="client_id">--}}
                                {{--<input type="hidden" name="user_id" value="{{ $task->user->id }}" v-model="user_id">--}}
                                <textarea class="form-control" rows="3" name="body"
                                          placeholder="Enter the body of the note"  v-model="body"></textarea>
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
