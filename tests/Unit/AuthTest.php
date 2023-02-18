<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function create_user_test() : void
    {
        $response = $this->postJson('/api/register', [
            'first_name' => 'Test User',
            'last_name' => 'Test User',
            'contact' => 'Test User',
            'email' => 'test@email.api',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(200);
    }
}
