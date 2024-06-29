<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->has(
            Task::factory(3)->has(
                Task::factory(3)->has(
                    Task::factory(3),
                    'subtasks'
                ),
                'subtasks'
            )
        )->create([
            'email' => 'user@test.com',
        ]);
    }
}
