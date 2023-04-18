<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
        ]);

        foreach([
            'Mono Color',
            'Stereo Pallete',
            'Three Pastels',
            'Four Seasons',
            'Five Stars'
        ] as $count => $title) {
            DB::table('cats')->insert([
                'title' => $title,
                'colors_count' => $count + 1,
            ]);
        }
    }
}
