@extends('layouts.app')

@section('content')
    <div class="contianer">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>My Tasks</h1>
                @include('tasks.loop')
            </div>
        </div>
    </div>
@endsection