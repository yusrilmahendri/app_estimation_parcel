<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        Parameter::create([
            'population_size' => 10,
            'budget' => 200000,
            'stopping_value' => 10000,
            'crossover_rate' => 0.8,
        ]);
    }
}
