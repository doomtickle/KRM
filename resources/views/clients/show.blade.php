@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="panel panel-default shadow">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $client->name }}</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>{{ $client->company }}</li>
                        <li>{{ $client->email }}</li>
                        <li>{{ $client->phone }}</li>
                        <li>{{ $client->comment }}</li>
                        @foreach($client->tasks as $task)
                            <li>{{ $task->description }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection