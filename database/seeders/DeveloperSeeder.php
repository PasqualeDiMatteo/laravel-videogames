<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $labels = ['Daniel', 'Marco', 'Matteo', 'Andrea', 'Pasquale'];

        foreach ($labels as $label) {
            $developer = new Developer();
            $developer->label = $label;
            $developer->color = $faker->hexColor();
            $developer->save();
        }
    }
}
