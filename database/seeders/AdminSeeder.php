<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Ajha',
            'email' => 'aj@gmail.com',
            'gender' => 'm',
            'address' => 'Matale',
            'mobile' => 0760007000,
            'role' => 'admin',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        
    }
}
