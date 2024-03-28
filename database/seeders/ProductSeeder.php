<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Products::create([
                'name' => $faker->name,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 100),
                'stock' => $faker->numberBetween(0, 100),
                'image' => $faker->imageUrl($width = 640, $height = 480)
            ]);
        }
    }
}
