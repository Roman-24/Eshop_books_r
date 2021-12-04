<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        for ($x = 1; $x <= 100; $x++){
            DB::table('books')->insert([
                'category' => random_int(1, 10),
                'tittle' => 'Kniha '.$x,
                'author' => 'Autor '.random_int(870, 1000),
                'publish_date' => Carbon::today()->subDay(random_int(0, 9999)),
                'price' => random_int(10, 140),
                'description' => Str::random(random_int(156, 500)),
                'img_path' => 'book'.$x.'.jpg',
                'created_at' => Carbon::now()
            ]);
        }
    }
}
