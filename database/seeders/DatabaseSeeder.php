<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

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
        $colors = collect(['crimson', 'green']);
        do{
        $color = $faker->safeColorName;
            $colors->push($color);
            $colors = $colors->unique();
        }while($colors->count() < 10);
    foreach ($colors as $color) {
        DB::table('Colors')->insert(
            [
                'color' => $color,
                'title' => $color

            ]
        );
    }
    DB::table('users')->insert([
        'name' => 'Petras',
        'email'=> 'petras@petras.lt',
        'password'=>Hash::make('123'),
        'role'=>1
    ]);


    }
}
