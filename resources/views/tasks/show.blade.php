@extends('layouts.app')

@section('content')
    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container is-fluid">
                <div class="columns">
                    <div class="column is-half">
                        <h1 class="title">Task ID: {{ $task->id }}</h1>
                        <p class="subtitle">Client: <strong>{{ $task->client->name }}</strong><br>
                            Assigned To: <strong>{{ $task->user->name }}</strong><br>
                            Due: <strong>{{ $task->due_date }}</strong></p>
                    </div>
                    <div class="column is-one-fourth">



                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="note-section" class="section">

        <div class="columns">
            <div class="column is-6 task-description">
                <div class="container is-fluid">
                    <div class="content">
                        <h2 class="title is-3 is-primary">Summary</h2>
                        <p>{{ $task->description }}</p>
                        <h2 class="title is-3 is-primary">Actions</h2>
                        <form class="columns action-buttons" action="#" method="post" @submit.prevent>
                            <button title="Mark this task complete. No follow up is necessary." class="column is-4 button is-huge is-info is-outlined">
                                <span class="icon">
                                    <i class="fa fa-check-square-o"></i>
                                </span>
                                <span class="button-note">Mark this task complete. No follow up is necessary.</span>
                            </button>
                            <button title="Schedule follow up for a team member." class="column is-4 button is-huge is-info is-outlined">
                                <span class="icon">
                                    <i class="fa fa-share-square-o"></i>
                                </span>
                                <span class="button-note">Schedule follow up for a team member.</span>
                            </button>
                            <button title="Schedule another follow-up for yourself." class="column is-4 button is-huge is-info is-outlined">
                                <span class="icon">
                                    <i class="fa fa-refresh"></i>
                                </span>
                                <span class="button-note">Schedule another follow-up for yourself.</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="column is-6 ">

                <div v-for="note in notes" class="task-note">
                    <p><strong>@{{ note.created_at }}</strong> <button class="button is-info is-outlined is-small"><span class="icon" ><i class="fa fa-pencil"></i></span></button> <button class="button is-outlined is-info is-small"><span class="icon" ><i class="fa fa-trash"></i></span></button></p>
                    <p v-text="note.body"></p>
                </div>
<hr>
                <form action="/note" method="post" @submit.prevent>
                    <div class="field">
                        {{ csrf_field() }}
                        <textarea class="textarea" rows="3" name="body" placeholder="Add a note to this task" v-model="body"></textarea>
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
