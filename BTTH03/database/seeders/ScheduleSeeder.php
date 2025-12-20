<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $classroomIds = DB::table('classrooms')->pluck('id')->toArray();
        if (count($classroomIds) === 0) {
            return;
        }
        foreach (range(1, 20) as $index) {
            DB::table('schedules')->insert([
                'classroom_id' => $faker->randomElement($classroomIds),
                'course_name' => $faker->sentence(3),
                'day_of_week' => $faker->word(),
                'time_slot' => $faker->word(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
