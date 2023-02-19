<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    public function test_guest_user_can_see_login_page(): void
    {
        $response = $this->get(route('auth.login'));

        $response->assertStatus(200);
    }

    public function test_guest_user_cannot_login_with_invalid_credentials(): void
    {
        $email = 'test@example.com';
        $password = 'password';

        User::factory()->create([
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $response = $this->post(route('auth.login.post'), [
            'email' => $email,
            'password' => 'invalid_password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('auth.login'));
        $response->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_guest_user_can_login_with_correct_credentials(): void
    {
        $email = 'test@example.com';
        $password = 'password';

        User::factory()->create([
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $response = $this->post(route('auth.login.post'), [
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('task.index'));

        $this->assertAuthenticated();
    }
}
