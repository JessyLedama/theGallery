<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tester',
            'email' => 'tester@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Superman',
            'email' => 'superman@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
