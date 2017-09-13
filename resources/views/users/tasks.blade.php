@extends('layouts.app')
@section('content')
<div class="hero is-info is-bold">
    <div class="hero-body">
        <div class="container is-fluid">
            <h1 class="title is-1">My tasks</h1>
        </div>
    </div>
</div>
<section class="section is-white is-bold">
    <div class="container-fluid">
        <div class="columns is-multiline">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            @include('tasks.loop')
        </div>
    </div>
</section>
@endsection
