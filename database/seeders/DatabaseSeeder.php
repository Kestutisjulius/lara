<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create('lt_LT');

        DB::table('Users')->insert([
            'name' => 'Kestutis',
            'email' => 'kestutis.julius@gmail.com',
            'password' => Hash::make('123'),
            'role' => 100,
            'visitor_ip'=> '127.0.0.1'
        ]);
        foreach (range(1, 10) as $_) {
            DB::table('Users')->insert([
                'name' => $faker->firstName.' '.$faker->lastName,
                'email' => $faker->email,
                'password' => Hash::make('123'),
                'role' => 1,
                'visitor_ip'=> $faker->ipv6
            ]);
        }

        $colors = collect(['crimson', 'green', 'purple']);

        do{
        $color = $faker->colorName;
            $colors->push($color);
            $colors = $colors->unique();
        }while($colors->count() < 20);

        foreach ($colors as $color) {
            DB::table('Colors')->insert(
                [
                    'color' => $color,
                    'title' => $color

                ]
            );
        }
        foreach (range(1, 10) as $_) {
            DB::table('Banks')->insert([
                'name' => $faker->company,
                'email' => $faker->email,
                'iban' => $faker->iban,
                'credit_num' => $faker->creditCardNumber,
                'amount' => rand(1, 999000) / 100
            ]);
        }
        $animals = collect(['Donkey', 'Racoon', 'Horse', 'Snake', 'Monkey', 'Chicken', 'Leo', 'Zebra', 'Crocodile', 'Antelope', 'Buffalo']);

        do{
            $animal = $faker->userName;
            $animals->push($animal);
            $animals = $animals->unique();
        }while($animals->count() < 20);

        foreach ($animals as $animal) {
            DB::table('Wild_animals')->insert(
                [
                    'name' => $animal,
                    'color_id' => rand(1,20),
                    'photo' => $faker->imageUrl

                ]
            );
        }
        foreach (range(1, 11) as $_) {
            DB::table('masters')->insert(
                ['master_name' => $faker->name]
            );
        }
        $skils = ['Dancer', 'Cat Striker', 'Rogiu rato chengeris', 'sukejas', 'klijuotojas', 'Lakuotojas', 'Dazytojas', 'katinu Pardavejas', 'kepejas', 'pepsio naikintojas', 'kosmonautas'];
        foreach ($skils as $skill) {
            DB::table('skills')->insert(
                ['skill' => $skill]
            );
        }
    }
}
