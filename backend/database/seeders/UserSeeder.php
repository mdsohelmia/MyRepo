<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Sohel Mia',
            'email' => 'sohelcse1999@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('123456'),
        ]);
        User::factory()->count(100)->create();
    }
}
