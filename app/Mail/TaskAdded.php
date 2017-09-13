<?php

namespace App\Mail;

use App\Task;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TaskAdded extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The task instance.
     *
     * @var Task
     */
    public $task;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $createdBy = User::find($this->task->created_by);
        $url       = 'http://crm.kerigan.com/task/'. $this->task->id;

        return $this->from('info@kerigan.com')
                    ->markdown('emails.tasks.added')
                    ->with([
                        'createdBy' => $createdBy,
                        'url'       => $url
                    ]);
    }
}
