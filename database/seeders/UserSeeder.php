<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Alister Gonzalez',
            'email'=>'ali.gonzalezq@duocuc.cl',
            'password'=>bcrypt('12345678')
        ])->assignRole('Cliente');

        User::factory(9)->create();
    }
}
