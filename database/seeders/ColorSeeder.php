<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
                'name' => 'BLACK-أسود',
                'hex_code' => '#000000'
            ],
            [
                'name' => 'WHITE-أبيض',
                'hex_code' => '#ffffff'
            ],
            [
                'name' => 'Red-أحمر',
                'hex_code' => '#ff0000'
            ],
            [
                'name' => 'Blue-أزرق',
                'hex_code' => '#0000ff'
            ],
            [
                'name' => 'Green-أخضر',
                'hex_code' => '#00ff00'
            ],
        ];

        foreach ($colors as $color) {
            Color::create($color);
        }
    }
}
