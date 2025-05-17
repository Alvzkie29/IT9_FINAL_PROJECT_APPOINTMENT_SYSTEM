<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'harold',
            'lastname' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),  
            'role' => 'admin',
        ]);
    }
}
