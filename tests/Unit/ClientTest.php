<?php

namespace Tests\Unit;

use App\Task;
use App\User;
use App\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientTest extends TestCase
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
    public function it_should_have_a_client_create_page()
    {
       $this->get('/client/create')->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_a_client()
    {
        $client = factory(Client::class)->create();
        $this->get('/client/'. $client->id)->assertStatus(200);
    }

    /** @test */
    public function a_client_has_tasks()
    {
        $client = factory(Client::class)->create();
        $task = factory(Task::class)->create([
            'client_id' => $client->id,
            'assigned_to' => $this->user->id,
            'created_by' => $this->user->id
        ]);

        $eager = Client::with('tasks')->find($client->id);

        $this->assertEquals($task->id, $eager->tasks()->first()->id);
    }

}
