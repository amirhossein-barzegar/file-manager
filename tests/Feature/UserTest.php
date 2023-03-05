<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;

class UserTest extends TestCase
{
    public function test_a_user_can_register_account() {
        $username = 'username'.fake()->unique()->userName();
        $password = bcrypt('secret');

        $resp = $this->post('/register', [
            'username' => $username,
            'password' => $password,
        ]);

        $resp->assertRedirectToRoute('home');
    }

    public function test_username_must_be_unique_in_registeration() {
        $user = User::first();
        $username = $user->username;
        $password = bcrypt('secret');

        $resp = $this->post('/register', [
            'username' => $username,
            'password' => $password,
            'password_confirmation' => $password
        ]);

        $resp->assertSessionHasErrors(['username']);
    }
    
    public function test_a_user_can_login_account() {
        $user = User::factory()->create();
        
        $resp = $this->post('/login', [
            'username' => $user->username,
            'password' => 'secret'
        ]);
        
        $resp->assertRedirectToRoute('home');
    }
}
