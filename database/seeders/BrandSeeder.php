<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            ['id' => 1,'name' => 'Only Sond'],
            ['id' => 2,'name' => 'Jack Jones'],
            ['id' => 3,'name' => 'Levis'],
            ['id' => 4,'name' => 'Adidas'],
            ['id' => 5,'name' => 'Nike'],
            ['id' => 6,'name' => 'Puma'],
            ['id' => 7,'name' => 'Reebok'],
            ['id' => 8,'name' => 'Selected'],
            ['id' => 9,'name' => 'New Balance'],
            ['id' => 10,'name' => 'Asos'],
        ];

        DB::table('brands')->insert($brands);
    }
}
