<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        DB::table('accounts')->insert([
            'name' => 'Medis',
            'surname' => 'Medinis',
            'identityCode' => '39207300125',
            'bankAccount' => 'LT240557281627945732',
            'balance' => '20',

        ]);
        DB::table('accounts')->insert([
            'name' => 'Jonas',
            'surname' => 'Jonaitis',
            'identityCode' => '39207300124',
            'bankAccount' => 'LT240557281627945733',
            'balance' => '30',

        ]);
        DB::table('accounts')->insert([
            'name' => 'Petras',
            'surname' => 'Petraitis',
            'identityCode' => '39207300125',
            'bankAccount' => 'LT240557281627945734',
            'balance' => '0',

        ]);

        DB::table('users')->insert([
            'name' => 'Mamutas',
            'email' => 'mamutas@gmail.com',
            'password' => Hash::make('123'),
            'role' => 10
        ]);
        DB::table('users')->insert([
            'name' => 'Kurmis',
            'email' => 'kurmis@gmail.com',
            'password' => Hash::make('123')
        ]);
    }
}
