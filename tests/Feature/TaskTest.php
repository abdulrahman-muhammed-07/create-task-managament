<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Jobs\StatisticsJob;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class TaskTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function test_logged_in_admin_can_see_tasks_list_page(): void
    {
        $admin = User::factory()->create(['type' => User::ADMIN]);
        $this->actingAs($admin)->get('/tasks')->assertStatus(200);
    }

    public function test_admin_can_add_task(): void
    {
        $admin = User::factory()->create(['type' => User::ADMIN,]);

        $this->actingAs($admin);

        $response = $this->post('/tasks', Task::factory()->make()->toArray());

        $this->assertDatabaseCount('tasks', 1);

        $response->assertStatus(302);
    }

    public function test_tasks_list_page_show_tasks_correctly()
    {
        $admin = User::factory()->create(['type' => User::ADMIN,]);

        $this->actingAs($admin);
        $response = $this->get('tasks');

        $response->assertSee('Tasks');
        $response->assertStatus(200);
    }

    public function test_update_statistics_job_when_create_new_task(): void
    {
        $user = User::factory()->create(['type' => User::USER]);
        $admin = User::factory()->create(['type' => User::ADMIN]);

        $this->actingAs($admin);
        Queue::fake();
        Queue::assertNothingPushed();
        $this->app->call([new StatisticsJob($user->id), 'handle']);
        $response = $this->post('tasks',  Task::factory()->make()->toArray());

        $response->assertStatus(302);
    }
}
