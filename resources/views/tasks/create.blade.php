@extends('layouts.app')

@section('content')
    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container is-fluid">
                <h1 class="title">Create a task</h1>
            </div>
        </div>
    </section>
    <section id="note-section" class="section">

        <div class="columns">
            <div class="column is-8 is-offset-2 task-description">
                <div class="container is-fluid">
                    <div class="content">
                        <form action="/task" method="post">
                            {{ csrf_field() }}
                            @include('forms.createTask')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection