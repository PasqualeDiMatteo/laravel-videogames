<?php

namespace Database\Seeders;

use App\Models\Console;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $labels = ['PS4', 'PC', 'Switch', 'Xbox'];
        $console = new Console();

        foreach ($labels as $label) {
            $console = new Console();
            $console->label = $label;
            $console->color = 'Black';
            $console->save();
        }
    }
}
