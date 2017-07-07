<?php

namespace Tests\Browser;

use App\Task;
use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NoteTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @group Note
     */
    public function a_user_can_add_a_note()
    {
        $user = factory(User::class)->create();
        $task = factory(Task::class)->create([
            'created_by'  => $user->id,
            'assigned_to' => $user->id
        ]);
        $this->browse(function (Browser $browser) use ($user, $task) {
            $browser->loginAs($user)
                    ->visit('/task/' . $task->id)
                    ->assertSee('Task ID: ' . $task->id)
                    ->type('body', 'This is a test note')
                    ->press('Add Note')
                    ->waitForText('This is a test note')
                    ->assertSeeIn('#note-section', 'This is a test note');
        });
    }
}
