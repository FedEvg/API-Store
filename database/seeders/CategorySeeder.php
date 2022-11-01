<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'Jeans', 'gender_id' => 1],
            ['id' => 2, 'name' => 'Jackets', 'gender_id' => 1],
            ['id' => 3, 'name' => 'Shirts', 'gender_id' => 1],
            ['id' => 4, 'name' => 'T-Shirts', 'gender_id' => 1],
        ];

        DB::table('categories')->insert($categories);
    }
}
