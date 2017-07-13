@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="hero is-primary is-bold is-fullheight">
        <div class="container">
            <div class="hero-head">
                <h1 class="title is-1">My tasks</h1>
            </div>
            <div class="hero-body">
                <div class="columns is-multiline">
                    @foreach($myTasks as $task)
                        <div class="column is-4">
                            <div class="card" draggable="true">
                                <header class="card-header is-flex">
                                    <p class="card-header-title">
                                        {{ $task->client->name }}
                                    </p>
                                    <p><span class="is-pulled-right"><small>Due: {{ Carbon\Carbon::parse($task->due_date)->format('F d, Y') }}</small></span>
                                    </p>
                                    <a class="card-header-icon">
      <span class="icon">
        <i class="fa fa-angle-down"></i>
      </span>
                                    </a>
                                </header>
                                <div class="card-content">
                                    <div class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis
                                        mauris.
                                        <a>@bulmaio</a>. <a>#css</a> <a>#responsive</a>
                                        <br>
                                        <small>11:09 PM - 1 Jan 2016</small>
                                    </div>
                                </div>
                                <footer class="card-footer">
                                    <a class="card-footer-item">Save</a>
                                    <a class="card-footer-item">Edit</a>
                                    <a class="card-footer-item">Delete</a>
                                </footer>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
