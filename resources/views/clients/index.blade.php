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
                @foreach($clients as $client)
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="/client/{{ $client->id }}">{{ $client->name }}</a></div>

                        <div class="panel-body">
                            Client info here
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
