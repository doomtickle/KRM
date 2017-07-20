@extends('layouts.app')

@section('content')
    <section class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container is-fluid">
                <h1 class="title">Create a client</h1>
            </div>
        </div>
    </section>
    <section id="note-section" class="section">

        <div class="columns">
            <div class="column is-6 task-description">
                <div class="container is-fluid">
                    <div class="content">
                        <form action="{{ route('client.store') }}" method="post">
                            {{ csrf_field() }}
                            @include('forms.createClient')
                        </form>
                    </div>
                </div>
            </div>
            <div class="column is-6 ">
                <div class="columns is-multiline">

                </div>
            </div>

        </div>
    </section>
@endsection