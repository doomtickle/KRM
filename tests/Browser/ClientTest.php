<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ClientTest extends DuskTestCase
{
    use DatabaseMigrations;
    /** @test */
    public function a_user_can_see_the_client_page()
    {
        $user = factory(User::class)->create();
        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                    ->visit('/client/create')
                    ->assertSee('Name');
        });
    }

    /** @test */
    public function a_user_can_create_a_client()
    {
        $user = factory(User::class)->create();
        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                    ->visit('/client/create')
                    ->type('name', 'Daron Adkins')
                    ->type('company', 'Kerigan Marketing Associates')
                    ->type('email', 'daron@kerigan.com')
                    ->type('phone', '850-866-6248')
                    ->type('comment', 'This is a test comment')
                    ->press("Submit");

            $browser->assertPathIs('/client/1')
                    ->assertSee('Daron Adkins');

        });
    }
}
