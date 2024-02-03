<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::factory()->create(['type' => User::ADMIN, 'email' => 'admin@converted.in', 'name' => 'Admin']);

        User::factory(99)->create(['type' => User::ADMIN]);
    }
}
