<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        //
        User::insert([
            'name' => 'Andi Acmad Zufadly Umar',
            'email' => 'andifadly200@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::insert([
            'name' => 'Admin',
            'email' => 'admin@fadly.tes',
            'password' => Hash::make('12345678'),
        ]);

        User::insert([
            'name' => 'shamp-video',
            'email' => 'andifadly2004@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
