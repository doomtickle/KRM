<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function users_should_see_the_home_page()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->get('/home')
            ->assertSee($user->name);
    }
}
