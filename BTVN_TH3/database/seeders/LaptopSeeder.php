<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

use function PHPUnit\Framework\isEmpty;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $renterIds = DB::table('renters')->pluck('id')->toArray();
        $faker = Faker::create();
        if (isEmpty($renterIds)) {
            echo "không có để thêm";
            return;
        }

        foreach (range(1, 10) as $index) {
            DB::table('laptops')->insert([
                'brand' => $faker->word,
                'model' => $faker->sentence(3),
                'specification' => $faker->sentence(4),
                'rental_status' => $faker->boolean,
                'renter_id' => $faker->randomElement($renterIds),
            ]);
        }
    }
}
