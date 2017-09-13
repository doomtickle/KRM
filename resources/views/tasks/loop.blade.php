@foreach($tasks as $task)
<div class="column is-one-third-tablet is-one-quarter-desktop" draggable="true">
    <div class="card main-task-card">
        <header class="card-header is-flex">
            <p class="card-header-title">
                <a href="{{ route('client.show', $task->client->id) }}">{{ $task->client->name }}</a>
            </p>
            <p>
                <span class="is-pulled-right">
                    @if($task->complete)
                    <i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color: green; margin-right: 10px;"></i>
                    @else
                    <small style="margin-right: 10px;">Due: {{ Carbon\Carbon::parse($task->due_date)->format('F d, Y') }}
                    @endif
                    </small>
                </span>
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>{{ $task->description }}</p>
                <p><span class="is-pulled-right"><small>Created by: {{ App\User::find($task->created_by)->name }}</small></span></p>
            </div>
        </div>
        <footer class="card-footer">
            <a href="{{ route('task.show', $task->id) }}" class="card-footer-item">View</a>
        </footer>
    </div>
</div>
@endforeach
