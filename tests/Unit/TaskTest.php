<?php

namespace Tests\Unit;

use App\Task;
use App\User;
use App\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;
    use DatabaseTransactions;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory('App\User')->create();
        $this->actingAs($this->user);
    }

    /** @test */
    public function it_should_have_a_create_task_page()
    {
       $this->get('/task/create')->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_their_tasks_page()
    {
        $task = factory(Task::class)->create([
            'assigned_to' => $this->user->id,
            'created_by' => $this->user->id
        ]);

        $this->get('/'. $this->user->id .'/tasks')
            ->assertStatus(200);
    }


    /** @test */
    public function a_task_belongs_to_a_user()
    {
        $task = factory(Task::class)->create([
            'assigned_to' => $this->user->id,
            'created_by' => $this->user->id
        ]);

        $user = User::with('tasks')->find($this->user->id);

        $this->assertEquals($task->id, $this->user->tasks()->first()->id);
        
    }

    /** @test */
    public function a_task_belongs_to_a_client()
    {

        $task = factory(Task::class)->create([
            'assigned_to' => $this->user->id,
            'created_by' => $this->user->id
        ]);

        $client = Client::with('tasks')->find(1);

        $this->assertEquals($task->id, $client->tasks()->first()->id);
        
    }

}
