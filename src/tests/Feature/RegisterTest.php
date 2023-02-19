<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    public function test_guest_user_can_see_register_page(): void
    {
        $response = $this->get(route('auth.register'));

        $response->assertStatus(200);
    }

    public function test_guest_user_can_register_with_correct_data(): void
    {
        $response = $this->post(route('auth.register.post'), [
            'email' => 'test@example.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('task.index'));

        $this->assertAuthenticated();
    }
}
