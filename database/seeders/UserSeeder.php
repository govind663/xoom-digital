<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Shiv Santosh Singh',
            'city' => 'Mumbai',
            'mobile_no' => '1234567890',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Suresh@12'),
            'user_type'=> '1',
            'designation' => 'Admin',
            'created_by' => 1,
            'created_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Arvind Rohit Yadav',
            'city' => 'Panvel',
            'mobile_no' => '1234567889',
            'email' => 'onField@gmail.com',
            'password' => Hash::make('1234567890'),
            'user_type'=> '2',
            'designation' => 'On Field',
            'created_by' => 2,
            'created_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Advitiya Amrish Subramanyan',
            'city' => 'Mumbai',
            'mobile_no' => '1234567899',
            'email' => 'sales@gmail.com',
            'password' => Hash::make('1234567890'),
            'user_type'=> '3',
            'designation' => 'Sales',
            'created_by' => 3,
            'created_at' => Carbon::now(),
        ]);

    }
}
