<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
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
        User::create([
            'name' => 'Francisco',
            'surname' => 'Trujillo',
            'email' => 'dakuk@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('1234'), //password
            'phone' => fake()->phoneNumber(),
            'remember_token' => Str::random(10),
        ]);//->assignRole('admin');

        User::factory(5)->create();
    }
}