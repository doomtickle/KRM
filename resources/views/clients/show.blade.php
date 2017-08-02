@extends('layouts.app')

@section('content')
    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container is-fluid">
                <h1 class="title">{{ $client->name }}</h1>
                <p class="subtitle">{{ $client->company }}</p>
                <p class="subtitle">
                    Email: <strong><a href="mailto:{{ $client->email }}">{{ $client->email }}</a></strong><br>
                    Due: <strong><a href="tel:{{ $client->phone }}">{{ $client->phone }}</a></strong></p>
            </div>
        </div>
    </section>
    <section id="note-section" class="section">
        <div class="container-fluid">
            <div class="content">
                <h2 class="title is-3 is-primary">Summary</h2>
                <p>{{ $client->comment }}</p>
                <h2 class="title is-3 is-primary">Tasks</h2>
            </div>

            <div class="columns is-multiline">
                @foreach($client->tasks as $task)
                    <div class="column is-one-third-tablet is-one-quarter-desktop" draggable="true">
                        <div class="card main-task-card">
                            <header class="card-header is-flex">
                                <p class="card-header-title">
                                    <a href="{{ route('client.show', $task->client->id) }}">{{ $task->client->name }}</a>
                                </p>
                                <p>
                                    <span class="is-pulled-right">
                                        <small>Due: {{ Carbon\Carbon::parse($task->due_date)->format('F d, Y') }}
                                        </small>
                                    </span>
                                </p>
                                <a class="card-header-icon">
                                      <span class="icon">
                                        <i class="fa fa-angle-down"></i>
                                      </span>
                                </a>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <p>{{ $task->description }}</p>
                                    <p><span class="is-pulled-right"><small>Created by: {{ App\User::find($task->created_by)->name }}</small></span></p>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <a href="{{ route('task.show', $task->id) }}" class="card-footer-item">View</a>
                            </footer>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection