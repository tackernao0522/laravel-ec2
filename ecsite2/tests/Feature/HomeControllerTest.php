<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this
            ->actingAs(User::find(1))
            ->get('/home');

        $response->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee('You are logged in!');
    }
}
