<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'category' => 2,
            'tittle' => 'Ako sa nenaučiť PHP za dva týždne',
            'description' => 'Apple watch',
            'author' => 'JA',
            'publish_date' => '02.02.2009',
            'img_path' => ' ',
            'price' => '999',
        ]);
    }
}
