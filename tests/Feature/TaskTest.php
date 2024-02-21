<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Log;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_task()
    {
        $task = Task::factory()->make();
        $user = User::first();
        $response = $this->actingAs($user)->postJson('/api/v1/tasks', $task->toArray());
        $response->assertOk()
            ->assertJson([
                'success' => true,
                'message' => 'resource created'
            ]);

        $this->assertDatabaseHas('tasks',[
            "title" => $task->title,
            "description" => $task->description
        ]);
    }
}
