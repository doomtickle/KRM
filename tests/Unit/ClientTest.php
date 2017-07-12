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

    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }


    /** @test */
    public function a_client_has_tasks()
    {
        $client = factory(Client::class)->create();
        factory(Task::class)->create([
            'client_id'   => $client->id,
            'assigned_to' => $this->user->id,
            'created_by'  => $this->user->id
        ]);

        $eager = Client::with('tasks')->find($client->id);

        $this->assertInstanceOf('App\Task', $eager->tasks()->first());

    }

}
