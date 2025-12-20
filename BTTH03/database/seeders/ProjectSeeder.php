<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('projects')->insert([
                'name' => $faker->name,
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'budget' => $faker->randomFloat(2, 1000000, 10000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
