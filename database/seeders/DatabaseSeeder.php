<?php

namespace Database\Seeders;

use App\Models\Transportation;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'name'     => 'Mirsaid Akhmedov',
            'email'    => 'akhmedovmirik@gmail.com',
            'password' => Hash::make('123123'),
        ]);

        Transportation::create([
            'origins'     => 'Bukhara',
            'destinations' => 'Tashkent',
            'mass'        => 10000,
        ]);

        Transportation::create([
            'origins'     => 'Tashkent',
            'destinations' => 'Moscow',
            'mass'        => 15000,
        ]);
    }
}
