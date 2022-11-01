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
            ['id' => 1,'name' => 'Red'],
            ['id' => 2,'name' => 'Blue'],
            ['id' => 3,'name' => 'Yellow'],
            ['id' => 4,'name' => 'Green'],
            ['id' => 5,'name' => 'Orange'],
            ['id' => 6,'name' => 'Pink'],
            ['id' => 7,'name' => 'Black'],
            ['id' => 8,'name' => 'Grey'],
            ['id' => 9,'name' => 'Brown'],
            ['id' => 10,'name' => 'Silver'],
        ];

        DB::table('colors')->insert($colors);
    }
}
