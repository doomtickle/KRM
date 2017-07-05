<?php

namespace Tests\Browser;

use App\Task;
use App\User;
use App\Client;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TaskTest extends DuskTestCase
{
    use DatabaseMigrations;
    /** @test */
    public function a_user_can_see_the_task_page()
    {
        $user = factory(User::class)->create();
        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                    ->visit('/task/create')
                    ->assertSee('Create a task');
        });
    }

    /** @test */
    public function a_user_can_create_a_task()
    {
        $user   = factory(User::class)->create();
        $client = factory(Client::class)->create();
        $this->browse(function (Browser $browser) use($user, $client) {
            $browser->loginAs($user)
                    ->visit('/task/create')
                    ->select('client_id', $client->id)
                    ->assertSelected('client_id', $client->id)
                    ->select('assigned_to', $user->id)
                    ->assertSelected('assigned_to', $client->id)
                    ->click('.input')
                    ->click('.flatpickr-day')
                    ->type('description', 'Lorem ipsum dolor amet')
                    ->press('Submit')
                    ->waitForLocation('/home')
                    ->assertSee('Success');
        });
        
    }

    /** @test */
    public function a_user_can_see_their_tasks()
    {
        $user   = factory(User::class)->create();
        $task   = factory(Task::class)->create([
            'assigned_to' => $user->id,
            'created_by' => $user->id
        ]);
        $this->browse(function (Browser $browser) use($user, $task) {
            $browser->loginAs($user)
                    ->visit('/'. $user->id .'/tasks')
                    ->assertSee($task->description);
        });
    }

}
