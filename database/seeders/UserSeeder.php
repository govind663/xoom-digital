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
            'name' => 'Admin',
            'city' => 'Mumbai',
            'mobile_no' => '1234567890',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Suresh@12'),
            'user_type'=> '1',
            'created_by' => 1,
            'created_at' => Carbon::now(),

        ]);
    }
}
