@extends('layouts.app')
@section('content')
<div class="hero is-info is-bold">
    <div class="hero-body">
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-8">
                    <h1 class="title is-1">{{ $incompleteTasksCount }} Incomplete Tasks</h1>
                </div>
                <div class="column is-4">
                    <a href="{{ route('task.create') }}" class="button is-primary is-pulled-right">Add a new task</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section is-white is-bold">
    <div class="columns">
        <div class="column">
            @if (session('status'))
            <div class="notification is-success">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
    <div class="container-fluid">
        <div class="columns is-multiline">
            @include('tasks.loop')
        </div>
    </div>
</section>
@endsection
