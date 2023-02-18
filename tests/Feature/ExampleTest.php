<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_api_return_new_user(): void
    {
        $response = $this->postJson('/api/register', [
            'first_name' => 'Test User',
            'last_name' => 'Test User',
            'contact' => 'Test User',
            'email' => 'test@email.dev',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201);
    }


    public function test_api_login_user_return_user_no_found() : void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'testi@dev.com',
            'password' => 'passwd',
        ]);

        $response->assertStatus(404);
    }


}
