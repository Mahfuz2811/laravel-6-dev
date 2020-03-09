<?php

use App\User;
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
            'name'      	=> 'Admin',
            'email'         => 'admin@example.com',
            'username'     	=> 'admin',
            'password'  	=> Hash::make('123456')
        ]);
    }
}
