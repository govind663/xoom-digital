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
        User::create(
            [
                'employee_code' => 'EMP/000002/2024',
                'name' => 'Valentina Robbins',
                'city' => 'Mumbai',
                'mobile_no' => '1234567890',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1234567890'),
                'user_type'=> '1',
                'designation' => 'Administrative',
                'created_by' => 1,
                'created_at' => Carbon::now(),
            ]);

        User::created([
            [
                'employee_code' => 'EMP/000003/2024',
                'name' => 'Stephanie Moore',
                'city' => 'Mumbai',
                'mobile_no' => '1234567899',
                'email' => 'sales@gmail.com',
                'password' => Hash::make('1234567890'),
                'user_type'=> '2',
                'designation' => 'Sales Manager',
                'created_by' => 2,
                'created_at' => Carbon::now(),
            ]
        ]);

        User::created([
            [
                'employee_code' => 'EMP/000004/2024',
                'name' => 'Josue Becker',
                'city' => 'Mumbai',
                'mobile_no' => '1234567889',
                'email' => 'sales@gmail.com',
                'password' => Hash::make('1234567890'),
                'user_type'=> '3',
                'designation' => 'On Field',
                'created_by' => 3,
                'created_at' => Carbon::now(),
            ]
        ]);
    }
}
