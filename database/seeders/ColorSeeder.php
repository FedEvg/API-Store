<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            ['name' => 'Yellow'],
            ['name' => 'Orange'],
            ['name' => 'Red'],
            ['name' => 'Pink'],
            ['name' => 'Blue'],
            ['name' => 'Green'],
            ['name' => 'Silver'],
            ['name' => 'Grey'],
            ['name' => 'Black'],
            ['name' => 'Brown'],
        ];

        DB::table('colors')->insert($colors);
    }
}
