<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Collections',
                'sort_order' => 1,
            ],
            [
                'name' => 'High Jewelry',
                'sort_order' => 2,
            ],
            [
                'name' => 'AD Signature',
                'sort_order' => 3,
            ],
            [
                'name' => 'News',
                'sort_order' => 4,
            ],
        ];

        foreach ($menus as $menu) {

            Menu::updateOrCreate(
                ['slug' => Str::slug($menu['name'])],
                [
                    'name'       => $menu['name'],
                    'slug'       => Str::slug($menu['name']),
                    'sort_order' => $menu['sort_order'],
                    'status'     => 1,
                ]
            );

        }
    }
}