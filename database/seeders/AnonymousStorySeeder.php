<?php

namespace Database\Seeders;

use App\Models\AnonymousStory;
use Illuminate\Database\Seeder;

class AnonymousStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake('id_ID');

        foreach (range(1, 12) as $i) {
            AnonymousStory::create([
                'story' => $faker->paragraphs($faker->numberBetween(2, 5), true),
            ]);
        }
    }
}
