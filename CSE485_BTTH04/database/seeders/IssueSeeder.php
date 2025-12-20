<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $computer_Ids = DB::table('computers')->pluck('id')->toArray();
        foreach (range(1, 20) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computer_Ids),
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTime,
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['low', 'medium', 'high']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}