@extends('layouts.app')
@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="hero is-info is-bold">
    <div class="hero-body">
        <div class="container is-fluid">
            <div class="columns">
                <div class="column is-8">
                    <h1 class="title is-1">Clients</h1>
                </div>
                <div class="column is-4">
                    <a href="{{ route('client.create') }}" class="button is-primary is-pulled-right">Add a new client</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section is-white is-bold">
    <div class="container-fluid">
        <div class="columns is-multiline">
            @foreach($clients as $client)
            <div class="column is-3" draggable="true">
                <div class="card main-task-card">
                    <header class="card-header is-flex">
                        <p class="card-header-title"><a href="{{ route('client.show', $client->id) }}">{{ $client->name }}</a></p>
                        <p>
                            <span class="card-header-icon">
                                <small>ID# {{ $client->id }}</small>
                            </span>
                        </p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <p>{{ $client->company }}<br>
                                <a href="mailto:{{ $client->email }}" >{{ $client->email }}</a><br>
                                <a href="tel:{{ $client->phone }}" >{{ $client->phone }}</a>
                            </p>
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a href="{{ route('client.show', $client->id) }}" class="card-footer-item">Edit</a>
                        <a class="card-footer-item">Delete</a>
                    </footer>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
