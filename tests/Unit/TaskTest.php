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

    protected function setUp()
    {
        parent::setUp();
        $this->user = create('App\User');
        $this->task = create('App\Task',[
            'assigned_to' => $this->user->id,
            'created_by' => $this->user->id
        ]);
    }

    /** @test */
    public function a_task_belongs_to_a_user()
    {
        $this->assertInstanceOf('App\User', $this->task->user()->first());
    }

    /** @test */
    public function a_task_belongs_to_a_client()
    {
        $this->assertInstanceOf('App\Client', $this->task->client()->first());
    }

}
