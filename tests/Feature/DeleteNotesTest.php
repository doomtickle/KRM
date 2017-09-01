<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteNotesTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

        $this->user   = create('App\User');
        $this->client = create('App\Client');
        $this->task   = create('App\Task', [
            'assigned_to' => $this->user->id,
            'created_by'  => $this->user->id
        ]);
    }

    /** @test */
    function a_note_can_be_deleted()
    {
        $this->signIn();

        $note = $this->createNote();

        $this->get('/task/'. $this->task->id .'/notes')
            ->assertJson([
                ['body' => $note->body]
            ]);

        $this->get('/note')
            ->assertJson([
                ['body' => $note->body]
            ]);

        $this->delete('/note/'. $note->id)
            ->assertJsonFragment([
                ['Success']
            ]);

        $notes = $this->get('/note')
            ->assertJsonMissing([
                ['body' => $note->body]
            ]);
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
