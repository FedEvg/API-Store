<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClothingSizeQuantitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clothing_size_quantities = [
            ['clothing_id' => 1, 'size_id' => 3, 'quantity' => 1],
            ['clothing_id' => 1, 'size_id' => 4, 'quantity' => 1],
            ['clothing_id' => 1, 'size_id' => 5, 'quantity' => 1],
            ['clothing_id' => 2, 'size_id' => 2, 'quantity' => 1],
            ['clothing_id' => 2, 'size_id' => 4, 'quantity' => 1],
            ['clothing_id' => 3, 'size_id' => 3, 'quantity' => 1],
            ['clothing_id' => 3, 'size_id' => 5, 'quantity' => 1],
            ['clothing_id' => 4, 'size_id' => 3, 'quantity' => 1],
            ['clothing_id' => 5, 'size_id' => 5, 'quantity' => 1],
            ['clothing_id' => 6, 'size_id' => 2, 'quantity' => 1],
            ['clothing_id' => 6, 'size_id' => 3, 'quantity' => 1],
            ['clothing_id' => 6, 'size_id' => 4, 'quantity' => 1],
            ['clothing_id' => 6, 'size_id' => 5, 'quantity' => 1],
            ['clothing_id' => 7, 'size_id' => 1, 'quantity' => 1],
            ['clothing_id' => 8, 'size_id' => 6, 'quantity' => 1],
            ['clothing_id' => 9, 'size_id' => 2, 'quantity' => 1],
            ['clothing_id' => 10, 'size_id' => 3, 'quantity' => 1],
        ];

        DB::table('clothing_size_quantities')->insert($clothing_size_quantities);
    }
}
