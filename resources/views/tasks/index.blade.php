@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>All Tasks</h1>
                @include('tasks.loop')
            </div>
        </div>
    </div>
@endsection
