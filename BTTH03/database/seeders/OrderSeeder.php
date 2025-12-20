<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $customerIds = DB::table('customers')->pluck('id')->toArray();
        if (count($customerIds) === 0) {
            return;
        }
        foreach (range(1, 10) as $index) {
            DB::table('orders')->insert([
                'customer_id' => $faker->randomElement($customerIds),
                'order_date' => $faker->date(),
                'total_price' => $faker->randomFloat(2, 100, 5000),
                'status' => $faker->randomElement(['pending', 'completed', 'cancelled']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
