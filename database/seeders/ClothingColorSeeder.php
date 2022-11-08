<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClothingColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clothing_colors = [
            ['clothing_id' => 1, 'color_id' => 1],
            ['clothing_id' => 1, 'color_id' => 2],
            ['clothing_id' => 1, 'color_id' => 3],

            ['clothing_id' => 2, 'color_id' => 5],
            ['clothing_id' => 2, 'color_id' => 6],

            ['clothing_id' => 3, 'color_id' => 7],
            ['clothing_id' => 3, 'color_id' => 8],

            ['clothing_id' => 4, 'color_id' => 1],
            ['clothing_id' => 5, 'color_id' => 2],
            ['clothing_id' => 5, 'color_id' => 9],

            ['clothing_id' => 6, 'color_id' => 3],
            ['clothing_id' => 6, 'color_id' => 4],

            ['clothing_id' => 7, 'color_id' => 5],
            ['clothing_id' => 7, 'color_id' => 10],

            ['clothing_id' => 8, 'color_id' => 4],
            ['clothing_id' => 9, 'color_id' => 4],
            ['clothing_id' => 10, 'color_id' => 6],
        ];

        DB::table('clothing_colors')->insert($clothing_colors);
    }
}
