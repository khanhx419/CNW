<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $libraryIds = DB::table('libraries')->pluck('id')->toArray();
        if (empty($libraryIds)) {
            echo "khong co thu vien";
            return;
        }
        foreach (range(1, 10) as $index) {
            DB::table('Books')->insert([
                'library_id' => $faker->randomElement($libraryIds),
                'title' => $faker->sentence,
                'author' => $faker->word,
                'publication_year' => $faker->numberBetween(1986, 2025),
                'genre' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
