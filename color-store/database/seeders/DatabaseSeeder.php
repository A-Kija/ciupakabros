<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Services\ColorNamingService;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $cns = new ColorNamingService;
        
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



        foreach(range(1, 20) as $_) {
            $catId = rand(1, 5);
            $id = DB::table('products')->insertGetId([
                'title' => $faker->cityPrefix. ' ' .$faker->streetSuffix,
                'price' => rand(100, 5000) / 100,
                'cat_id' => $catId
            ]);

            foreach(range(1, $catId) as $_) {
                $hex = $faker->hexcolor;
                DB::table('colors')->insert([
                    'hex' => $hex,
                    'title' => $cns->nameIt(substr($hex, 1)),
                    'product_id' => $id
                ]);
            }

        }




    }
}
