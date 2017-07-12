<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadClientsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_should_have_a_client_create_page()
    {
        $this->signIn();
        $this->get('/client/create')->assertStatus(200);
    }

    /** @test */
    public function an_unauthenticated_user_cannot_view_a_client()
    {
        $client = make('App\Client');
        $this->withExceptionHandling()->get("/client/{$client->id}")->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_view_a_client()
    {

        $this->signIn();
        $client = create('App\Client');

        $response = $this->get('/client/' . $client->id);

        $response->assertSee($client->name);

    }
    
    /** @test */
    public function an_authenticated_user_can_view_all_clients()
    {
        $this->signIn();

        $client = create('App\Client');

        $this->get('/client')->assertSee($client->name);

    }

}