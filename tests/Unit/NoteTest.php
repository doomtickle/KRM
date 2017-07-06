<?php

namespace Tests\Unit;

use App\Note;
use App\Task;
use App\User;
use App\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NoteTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;
    use DatabaseTransactions;

    protected $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    /** @test */
    public function a_note_belongs_to_a_task()
    {
        $client = factory(Client::class)->create();
        $task   = factory(Task::class)->create([
            'assigned_to' => $this->user->id,
            'created_by'  => $this->user->id
        ]);

        $note = factory(Note::class)->create([
            'user_id'   => $this->user->id,
            'client_id' => $client->id,
            'task_id'   => $task->id
        ]);

        $eager = $note->with('task')->find($note->id);

        $this->assertEquals($task->id, $eager->task->id);
        $this->assertDatabaseHas('notes', ['body' => $eager->body]);
        $this->assertDatabaseHas('notes', ['user_id' => $eager->user->id]);
        $this->assertDatabaseHas('notes', ['client_id' => $eager->client->id]);
        $this->assertDatabaseHas('notes', ['task_id' => $eager->task->id]);
    }

    /** @test */
    public function a_note_belongs_to_a_client()
    {
        $client = factory(Client::class)->create();
        $task   = factory(Task::class)->create([
            'assigned_to' => $this->user->id,
            'created_by'  => $this->user->id
        ]);

        $note = factory(Note::class)->create([
            'user_id'   => $this->user->id,
            'client_id' => $client->id,
            'task_id'   => $task->id
        ]);

        $eager = $note->with('client')->first();

        $this->assertEquals($client->id, $eager->client->id);
        $this->assertDatabaseHas('notes', ['body' => $eager->body]);
        $this->assertDatabaseHas('notes', ['user_id' => $eager->user->id]);
        $this->assertDatabaseHas('notes', ['client_id' => $eager->client->id]);
        $this->assertDatabaseHas('notes', ['task_id' => $eager->task->id]);
    }

    /** @test */
    public function a_note_belongs_to_a_user()
    {
        $client = factory(Client::class)->create();
        $task   = factory(Task::class)->create([
            'assigned_to' => $this->user->id,
            'created_by'  => $this->user->id
        ]);

        $note = factory(Note::class)->create([
            'user_id'   => $this->user->id,
            'client_id' => $client->id,
            'task_id'   => $task->id
        ]);

        $eager = $note->with('user')->first();

        $this->assertEquals($this->user->id, $eager->user->id);
        $this->assertDatabaseHas('notes', ['body' => $eager->body]);
        $this->assertDatabaseHas('notes', ['user_id' => $eager->user->id]);
        $this->assertDatabaseHas('notes', ['client_id' => $eager->client->id]);
        $this->assertDatabaseHas('notes', ['task_id' => $eager->task->id]);

    }
    
}
