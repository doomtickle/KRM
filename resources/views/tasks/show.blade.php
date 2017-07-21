@extends('layouts.app')

@section('content')
    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container is-fluid">
                <h1 class="title">{{ $task->client->name }}</h1>
                <p class="subtitle"><a href="mailto:{{ $task->client->email }}" >{{ $task->client->email }}</a> | <a href="tel:{{ $task->client->phone }}" >{{ $task->client->phone }}</a></p>
                <p class="subtitle">
                    Assigned To: <strong>{{ $task->user->name }}</strong><br>
                    Due: <strong>{{ \Carbon\Carbon::parse($task->due_date)->format('F d, Y') }}</strong></p>
            </div>
        </div>
    </section>
    <section id="note-section" class="section">

        <div class="columns">
            <div class="column is-7 task-description">
                <div class="container is-fluid">
                    <div class="content">
                        <h2 class="title is-3 is-primary">Summary</h2>
                        <p>{{ $task->description }}</p>
                        <h2 class="title is-3 is-primary">Actions</h2>
                        <form class=" action-buttons" action="#" method="post" @submit.prevent>
                            <div class="columns is-multiline">
                                <div class="column is-12-tablet is-one-third-desktop">
                                    <button title="Mark this task complete. No follow up is necessary."
                                            class="column button is-huge is-primary is-outlined complete">
                                        <span class="icon">
                                            <i class="fa fa-check-square-o"></i>
                                        </span>
                                        <span class="button-note">Task complete. No follow-up necessary.</span>
                                    </button>
                                </div>
                                <div class="column is-6-tablet is-one-third-desktop">
                                    <button title="Schedule follow up for a team member."
                                            class="column button is-huge is-info is-outlined pass-on">
                                        <span class="icon">
                                            <i class="fa fa-share-square-o"></i>
                                        </span>
                                        <span class="button-note">Pass along to another team member.</span>
                                    </button>
                                </div>
                                <div class="column is-6-tablet is-one-third-desktop">
                                    <button title="Schedule another follow-up for yourself."
                                            class="column button is-huge is-warning is-outlined reschedule">
                                        <span class="icon">
                                            <i class="fa fa-refresh"></i>
                                        </span>
                                        <span class="button-note">Schedule follow-up for yourself.</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="column is-5 ">

                <div v-for="note in notes" class="task-note">
                    <p><strong>@{{ note.created_at }}</strong>
                        {{--<button class="button is-info is-outlined is-small"><span class="icon"><i--}}
                                        {{--class="fa fa-pencil"></i></span></button>--}}
                        <button class="button is-outlined is-danger is-small"><span class="icon"><i
                                        class="fa fa-trash"></i></span></button>
                    </p>
                    <p v-text="note.body"></p>
                    <hr>
                </div>

                <form action="/note" method="post" @submit.prevent>
                    <div class="field">
                        {{ csrf_field() }}
                        <textarea class="textarea" rows="3" name="body" placeholder="Add a note to this task"
                                  v-model="body"></textarea>
                    </div>
                    <div class="field">
                        <button class="button is-info" @click="addNote(
                                {{ $task->user->id }},
                                {{ $task->client->id }},
                                {{ $task->id }} )">Add Note
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </section>
@endsection
@section('scripts.footer')
    <script>
    </script>
@endsection
