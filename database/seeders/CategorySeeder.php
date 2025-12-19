<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        $categories = [
            ['name' => 'Work', 'color' => 'blue'],
            ['name' => 'Personal', 'color' => 'green'],
            ['name' => 'Health', 'color' => 'red'],
        ];

        foreach($categories as $category) {
            $user->categories()->create($category);
        }
    }
}
