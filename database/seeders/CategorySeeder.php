<?php

namespace Database\Seeders;

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
        DB::table('categories')->insert([
            'name' => 'Rozprávky'
        ]);

        DB::table('categories')->insert([
            'name' => 'Akčné'
        ]);

        DB::table('categories')->insert([
            'name' => 'Detektívne'
        ]);

        DB::table('categories')->insert([
            'name' => 'Dráma'
        ]);

        DB::table('categories')->insert([
            'name' => 'Prírodné'
        ]);

        DB::table('categories')->insert([
            'name' => 'Historické'
        ]);

        DB::table('categories')->insert([
            'name' => 'Sci-fy'
        ]);

        DB::table('categories')->insert([
            'name' => 'Romatické'
        ]);

        DB::table('categories')->insert([
            'name' => 'Fantasy'
        ]);

        DB::table('categories')->insert([
            'name' => 'Beletria'
        ]);
    }
}
