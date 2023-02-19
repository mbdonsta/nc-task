<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseTransactions;

    public function test_guest_user_cannot_see_task_page(): void
    {
        $response = $this->get(route('task.index'));

        $response->assertStatus(302);
        $response->assertRedirect(route('auth.login'));
    }

    public function test_authenticated_user_can_see_task_page(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get(route('task.index'));

        $response->assertStatus(200);
        $response->assertViewIs('task.index');
    }

    public function test_authenticated_user_can_create_task(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $task = [
            'title' => 'This is title',
            'comment' => 'This is comment',
            'date' => '2023-03-14',
            'minutes_spent' => 20
        ];
        $response = $this->post(route('task.store'), $task);

        $response->assertStatus(302);
        $response->assertRedirect(route('task.index'));
        $this->assertDatabaseHas((new Task)->getTable(), $task);
    }
}
