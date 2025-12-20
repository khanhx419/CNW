<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $projectIds = DB::table('projects')->pluck('id')->toArray();
        if (count($projectIds) === 0) {
            return;
        }
        foreach (range(1, 10) as $index) {
            DB::table('employees')->insert([
                'name' => $faker->name,
                'position' => $faker->word(),
                'project_id' => $faker->randomElement($projectIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
