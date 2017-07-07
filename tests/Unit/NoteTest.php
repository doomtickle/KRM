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
    protected $client;
    protected $task;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);

        $this->client = factory(Client::class)->create();
        $this->task   = factory(Task::class)->create([
            'assigned_to' => $this->user->id,
            'created_by'  => $this->user->id
        ]);
    }

    /** @test */
    public function a_note_belongs_to_a_task()
    {
        $note = factory(Note::class)->create([
            'user_id'   => $this->user->id,
            'client_id' => $this->client->id,
            'task_id'   => $this->task->id
        ]);

        $eager = $note->with('task')->find($note->id);

        $this->assertEquals($this->task->id, $eager->task->id);
        $this->assertDatabaseHas('notes', ['body' => $eager->body]);
        $this->assertDatabaseHas('notes', ['user_id' => $eager->user->id]);
        $this->assertDatabaseHas('notes', ['client_id' => $eager->client->id]);
        $this->assertDatabaseHas('notes', ['task_id' => $eager->task->id]);
    }

    /** @test */
    public function a_note_belongs_to_a_client()
    {

        $note = factory(Note::class)->create([
            'user_id'   => $this->user->id,
            'client_id' => $this->client->id,
            'task_id'   => $this->task->id
        ]);

        $eager = $note->with('client')->first();

        $this->assertEquals($this->client->id, $eager->client->id);
        $this->assertDatabaseHas('notes', ['body' => $eager->body]);
        $this->assertDatabaseHas('notes', ['user_id' => $eager->user->id]);
        $this->assertDatabaseHas('notes', ['client_id' => $eager->client->id]);
        $this->assertDatabaseHas('notes', ['task_id' => $eager->task->id]);
    }

    /** @test */
    public function a_note_belongs_to_a_user()
    {
        $note = factory(Note::class)->create([
            'user_id'   => $this->user->id,
            'client_id' => $this->client->id,
            'task_id'   => $this->task->id
        ]);

        $eager = $note->with('user')->first();

        $this->assertEquals($this->user->id, $eager->user->id);
        $this->assertDatabaseHas('notes', ['body' => $eager->body]);
        $this->assertDatabaseHas('notes', ['user_id' => $eager->user->id]);
        $this->assertDatabaseHas('notes', ['client_id' => $eager->client->id]);
        $this->assertDatabaseHas('notes', ['task_id' => $eager->task->id]);

    }

    /** @test */
    public function a_user_can_add_a_note()
    {
        $note = factory(Note::class)->create([
            'user_id'   => $this->user->id,
            'client_id' => $this->client->id,
            'task_id'   => $this->task->id
        ]);

        $response = $this->json('POST', '/note', [
            'user_id'   => $note->user_id,
            'task_id'   => $note->task_id,
            'client_id' => $note->client_id,
            'body'      => $note->body
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'Success'
            ]);
    }

}
