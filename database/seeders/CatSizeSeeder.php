<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catSizes = [
            ['id' => 1,'name' => 'Size jeans'],
            ['id' => 2,'name' => 'Size shoes'],
            ['id' => 3,'name' => 'Size clothing'],
        ];

        DB::table('cat_sizes')->insert($catSizes);
    }
}
