<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StatisticTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function test_statistics_list_page_show_statistics_correctly(): void
    {
        $admin = User::factory()->create(['type' => User::ADMIN]);

        $this->actingAs($admin);
        $response = $this->get('statistics');

        $response->assertSee('Statistics');
        $response->assertStatus(200);
    }
}
