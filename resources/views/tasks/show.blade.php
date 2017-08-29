@extends('layouts.app')

@section('content')
    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container is-fluid">
                <h1 class="title">{{ $task->client->name }}</h1>
                <p class="subtitle"><a href="mailto:{{ $task->client->email }}">{{ $task->client->email }}</a> | <a
                            href="tel:{{ $task->client->phone }}">{{ $task->client->phone }}</a></p>
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
                        <div class=" action-buttons">
                            <div class="columns is-multiline">
                                <div class="column is-12-tablet is-one-third-desktop">
                                    <form action="/task/{{ $task->id }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}

                                        <input type="hidden" name="complete" value="1">

                                        <button type="submit"
                                                title="Mark this task complete. No follow up is necessary."
                                                class="column button is-huge is-primary is-outlined complete">
                                        <span class="icon">
                                            <i class="fa fa-check-square-o"></i>
                                        </span>
                                            <span class="button-note">Task complete. No follow-up necessary.</span>
                                        </button>
                                    </form>
                                </div>
                                <div class="column is-6-tablet is-one-third-desktop">
                                    <button title="Schedule follow up for a team member."
                                            class="column button is-huge is-info is-outlined pass-on"
                                            @click="$emit('toggleModal','passOn')">
                                        <span class="icon">
                                            <i class="fa fa-share-square-o"></i>
                                        </span>
                                        <span class="button-note">Pass along to another team member.</span>
                                    </button>
                                </div>
                                <div class="column is-6-tablet is-one-third-desktop">
                                    <button title="Schedule another follow-up for yourself."
                                            class="column button is-huge is-warning is-outlined reschedule"
                                            @click="$emit('toggleModal','reschedule')">
                                        <span class="icon">
                                            <i class="fa fa-refresh"></i>
                                        </span>
                                        <span class="button-note">Schedule follow-up for yourself.</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-5 ">

                <addnote :id="getTaskId" :user-id="{{ $task->user->id }}" :client-id="{{ $task->client->id }}" :task-id="{{ $task->id }}" >
                    {{ csrf_field() }}
                </addnote>

            </div>

        </div>
    </section>
    <passmodal></passmodal>
@endsection
