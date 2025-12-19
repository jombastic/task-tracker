<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::with('categories')->first();

        $categories = $user->categories;

        Task::factory()
            ->count(10)
            ->create([
                'user_id' => $user->id,
            ])
            ->each(function ($task) use ($categories) {
                $task->update([
                    'category_id' => $categories->random()->id
                ]);
            });
    }
}
