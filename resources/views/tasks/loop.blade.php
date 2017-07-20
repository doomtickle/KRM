@foreach($tasks as $task)
    <div class="column is-one-third-tablet is-one-quarter-desktop" draggable="true">
        <div class="card main-task-card">
            <header class="card-header is-flex">
                <p class="card-header-title">
                    <a href="{{ route('client.show', $task->client->id) }}">{{ $task->client->name }}</a>
                </p>
                <p>
                                        <span class="is-pulled-right">
                                            <small>Due: {{ Carbon\Carbon::parse($task->due_date)->format('F d, Y') }}
                                            </small>
                                        </span>
                </p>
                <a class="card-header-icon">
                                      <span class="icon">
                                        <i class="fa fa-angle-down"></i>
                                      </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <p>{{ $task->description }}</p>
                    <p><span class="is-pulled-right"><small>Created by: {{ App\User::find($task->created_by)->name }}</small></span></p>
                </div>
            </div>
            <footer class="card-footer">
                <a href="{{ route('task.show', $task->id) }}" class="card-footer-item">View</a>
                <a class="card-footer-item">Pass On</a>
                <a class="card-footer-item">Complete</a>
            </footer>
        </div>
    </div>
@endforeach
