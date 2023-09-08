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
        $console = new Console();

        $console->label = 'PS4';
        $console->color = 'black';

        $console->save();
    }
}
