<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'name' => 'Roman',
            'email' => 'roman@roman',
            'password' => Hash::make('romanroman'),
        ]);

        DB::table('books')->insert([
            'name' => 'Tibor',
            'email' => 'tibor@tibor',
            'password' => Hash::make('tibortibor'),
        ]);
    }
}
