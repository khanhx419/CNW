<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->name,
                'model' => $faker->name,
                'operating_system' => $faker->sentence(3),
                'processor' => $faker->name,
                'memory' => $faker->randomElement([8, 16, 32, 64]),
                'available' => $faker->boolean(80),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}