<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'nama' => 'admin',
            'username' => 'admin123',
            'password' => bcrypt('admin123'),
            'role' => 1,
            'foto' => 'default.jpg',
        ]);
    }
}
