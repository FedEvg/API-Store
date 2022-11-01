<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            ['name' => 'XS', 'cat_size_id' => '3'],
            ['name' => 'S', 'cat_size_id' => '3'],
            ['name' => 'M', 'cat_size_id' => '3'],
            ['name' => 'L', 'cat_size_id' => '3'],
            ['name' => 'XL', 'cat_size_id' => '3'],
            ['name' => 'XXL', 'cat_size_id' => '3'],
        ];

        DB::table('sizes')->insert($sizes);
    }
}
