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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create('lt_LT');

        $fantasyColors = collect(['crimson', 'pink']);

        do {
            $fantasyColors->push($faker->safeColorName);
            $fantasyColors = $fantasyColors->unique();
        } while ($fantasyColors->count() < 10);



        foreach ($fantasyColors as $color) {
            DB::table('colors')->insert([
                'color' => $color,
                'title' => $color
            ]);
        }


        $animals = ['Big Cat', 'Tiger', 'Puma', 'Penguin', 'Zebro', 'Racoon', 'Donkey', 'Snake', 'Koala', 'Elephant'];

        foreach (range(1, 77) as $_) {
            DB::table('animals')->insert([
                'name' => $animals[rand(0, count($animals) - 1)],
                'color_id' => rand(1, 10)
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Mamutas',
            'email' => 'mamutas@gmail.com',
            'password' => Hash::make('123')
        ]);
        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
            'role' => 10
        ]);


        foreach (range(1, 9) as $_) {
            DB::table('masters')->insert([
                'master_name' => $faker->name
            ]);
        }

        $skills = [
            'Belly Dance',
            'Stroke a Cat',
            'Eat cake',
            'Change wheel',
            'Get angry'
        ];

        foreach ($skills as $skill) {
            DB::table('skills')->insert([
                'skill' => $skill
            ]);
        }
    }
}
