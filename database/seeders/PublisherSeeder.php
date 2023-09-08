<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = config('publisher');
        foreach ($publishers as $publisher) {
            $new_publisher = new Publisher();
            $new_publisher->label = $publisher['label'];
            $new_publisher->color = $publisher['color'];
            $new_publisher->save();
        }
    }
}
