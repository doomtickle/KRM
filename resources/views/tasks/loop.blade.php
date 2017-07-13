@foreach($tasks as $task)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Client: <a href="/client/{{ $task->client->id }}">{{ $task->client->name }}</a></h4>
            <p>Assigned to:
                <a href="#">
                    {{ $task->user->name }}
                </a>
                <span class="pull-right">Due: {{ $task->due_date }}</span>
            </p>
        </div>

        <div class="panel-body">
            <p><strong>Description: </strong>{{ $task->description }}</p>
            <p>
                <small>
                                    <span class="pull-right">
                                        Created by: <a href="#">{{ App\User::find($task->created_by)->name }}</a>
                                    </span>
                </small>
            </p>
            @if($task->notes()->get()->count() > 0)
                <p>&nbsp;</p>
                <hr>
                <h4>Notes:</h4>
                <ul>
                    @foreach($task->notes()->get() as $note)
                        <li>{{ $note->body }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endforeach
