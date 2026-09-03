<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;
use App\Models\Size;

class ColorSizeSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Colors
        |--------------------------------------------------------------------------
        */

        $colors = [
            [
                'name' => 'Black',
                'code' => '#000000',
                'status' => 1,
            ],
            [
                'name' => 'White',
                'code' => '#FFFFFF',
                'status' => 1,
            ],
            [
                'name' => 'Red',
                'code' => '#FF0000',
                'status' => 1,
            ],
            [
                'name' => 'Blue',
                'code' => '#0000FF',
                'status' => 1,
            ],
            [
                'name' => 'Navy Blue',
                'code' => '#000080',
                'status' => 1,
            ],
            [
                'name' => 'Green',
                'code' => '#008000',
                'status' => 1,
            ],
            [
                'name' => 'Olive',
                'code' => '#808000',
                'status' => 1,
            ],
            [
                'name' => 'Beige',
                'code' => '#F5F5DC',
                'status' => 1,
            ],
            [
                'name' => 'Brown',
                'code' => '#8B4513',
                'status' => 1,
            ],
            [
                'name' => 'Grey',
                'code' => '#808080',
                'status' => 1,
            ],
            [
                'name' => 'Light Grey',
                'code' => '#D3D3D3',
                'status' => 1,
            ],
            [
                'name' => 'Pink',
                'code' => '#FFC0CB',
                'status' => 1,
            ],
            [
                'name' => 'Purple',
                'code' => '#800080',
                'status' => 1,
            ],
            [
                'name' => 'Orange',
                'code' => '#FFA500',
                'status' => 1,
            ],
            [
                'name' => 'Yellow',
                'code' => '#FFFF00',
                'status' => 1,
            ],
            [
                'name' => 'Cream',
                'code' => '#FFFDD0',
                'status' => 1,
            ],
            [
                'name' => 'Gold',
                'code' => '#D4AF37',
                'status' => 1,
            ],
            [
                'name' => 'Silver',
                'code' => '#C0C0C0',
                'status' => 1,
            ],
        ];

        foreach ($colors as $color) {
            Color::updateOrCreate(
                ['name' => $color['name']],
                $color
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Sizes
        |--------------------------------------------------------------------------
        */

        $sizes = [
            'XXS',
            'XS',
            'S',
            'M',
            'L',
            'XL',
            'XXL',
            'XXXL',
        ];

        foreach ($sizes as $size) {
            Size::updateOrCreate(
                ['name' => $size],
                [
                    'name' => $size,
                    'status' => 1,
                ]
            );
        }
    }
}