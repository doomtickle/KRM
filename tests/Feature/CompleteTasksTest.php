<?php

namespace Tests\Feature;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CompleteTasksTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->user = create('App\User');
    }

    /** @test */
    public function it_can_be_marked_complete()
    {
        $this->signIn();

        $task = create('App\Task', [
            'assigned_to' => $this->user->id,
            'created_by'  => $this->user->id
        ]);

        $this->patch("/task/{$task->id}", [
            'client_id'   => $task->client_id,
            'assigned_to' => $this->user->id,
            'due_date'    => $task->due_date,
            'description' => $task->description,
            'complete'    => 1
        ]);

        $task = Task::find($task->id);
        $this->assertEquals(1, $task->complete);
    }

    private function makeTask()
    {
        $task = make('App\Task', [
            'assigned_to' => $this->user->id,
            'created_by'  => $this->user->id
        ]);

        return $task;
    }

    private function createTask()
    {
        $task = create('App\Task', [
            'assigned_to' => $this->user->id,
            'created_by'  => $this->user->id
        ]);

        return $task;
    }
}
