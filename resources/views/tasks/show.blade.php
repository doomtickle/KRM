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
            </div>
        </div>
    </div>
</div>
@endsection
