@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-10">
        <ul>
            @foreach($tasks as $task)
                <li>{{ $task->description }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection