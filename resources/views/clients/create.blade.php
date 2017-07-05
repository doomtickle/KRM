@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-offset-4 col-md-4">
        <div class="panel panel-default shadow">
            <div class="panel-heading">
            <h3 class="panel-title">Create a client</h3>
            </div>
            <div class="panel-body">
            <form action="{{ route('client.store') }}" method="post">
            {{ csrf_field() }}
                @include('forms.createClient')
            </form>
            </div>
        </div>
    </div>
</div>
@endsection