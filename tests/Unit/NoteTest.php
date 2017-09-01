<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NoteTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

        $this->client = create('App\Client');
        $this->user   = create('App\User');
        $this->task   = create('App\Task', [
            'assigned_to' => $this->user->id,
            'created_by'  => $this->user->id
        ]);
    }

    /** @test */
    public function a_note_belongs_to_a_task()
    {
        $note = $this->createNote();

        $eager = $note->with('task')->find($note->id);

        $this->assertInstanceOf('App\Task', $eager->task()->first());
    }

    /** @test */
    public function a_note_belongs_to_a_client()
    {

        $note = $this->createNote();

        $eager = $note->with('client')->first();

        $this->assertInstanceOf('App\Client', $eager->client()->first());
    }

    /** @test */
    public function a_note_belongs_to_a_user()
    {
        $note = $this->createNote();

        $eager = $note->with('user')->first();

        $this->assertInstanceOf('App\User', $eager->user()->first());

    }

    protected function makeNote()
    {
        $note = make('App\Note', [
            'user_id'   => $this->user->id,
            'client_id' => $this->client->id,
            'task_id'   => $this->task->id
        ]);

        return $note;
    }

    protected function createNote()
    {
        $note = create('App\Note', [
            'user_id'   => $this->user->id,
            'client_id' => $this->client->id,
            'task_id'   => $this->task->id
        ]);

        return $note;
    }
}
