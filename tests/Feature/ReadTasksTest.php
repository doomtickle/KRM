<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadTasksTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_browse_tasks()
    {
        $user = create('App\User');
        $this->signIn($user);
        $task = create('App\Task', [
            'assigned_to' => $user->id,
            'created_by'  => $user->id,
        ]);

        $this->get('/task')
             ->assertSee($task->description);
    }
}
