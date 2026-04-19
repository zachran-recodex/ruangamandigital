<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::query()->updateOrCreate(
            ['email' => 'zachranraze@recodex.id'],
            [
                'name' => 'Zachran Razendra',
                'password' => Hash::make('password'),
            ]
        );

        $this->call([
            AnonymousStorySeeder::class,
        ]);
    }
}
