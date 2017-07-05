@extends('layouts.app')

@section('content')
<div class="contianer">
@foreach($tasks as $task)
<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="panel panel-default shadow">
				<div class="panel-heading">
					<h3 class="panel-title">{{ $task->client->name }} <a class="heading-link" href="{{ route('client.show', $task->client->id) }}"><i class="glyphicon glyphicon-search"></i></a></h3>
				</div>
				<div class="panel-body">
					{{ $task->description }}
				</div>
			</div>
		</div>
	</div>
@endforeach
</div>
@endsection